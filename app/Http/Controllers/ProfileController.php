<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User; 
use App\Models\InterestPlace; 
use App\Models\Configuration; 
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Muestra una lista de perfiles con sus relaciones cargadas.
     */
    public function index()
    {
        $profiles = Profile::with(['user', 'interestPlaces', 'configuration'])->latest()->paginate(10);
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Muestra el formulario para crear un nuevo perfil.
     */
    public function create()
    {
        // Obtener datos necesarios para los selects del formulario
        $users = User::all()->pluck('name', 'id');
        $interestPlaces = InterestPlace::all()->pluck('name', 'id');
        $configurations = Configuration::all()->pluck('name', 'id');
        return view('profiles.create', compact('users', 'interestPlaces', 'configurations'));
    }

    /**
     * Almacena un nuevo perfil en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'gender' => 'nullable|string|max:20',
            'profile_ph' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'nickname' => 'required|string|max:50|unique:profiles,nickname',
            'cyclist_type' => 'required|string|max:50',
            'busy_routes' => 'nullable|integer|min:0',
            'achievements' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'interest_place_id' => 'nullable|exists:interest_places,id',
            'configuration_id' => 'nullable|exists:configurations,id',
            'interest_places' => 'nullable|array',
        ]);

        // Crear una nueva instancia de perfil
        $profile = new Profile($request->except('profile_ph', 'interest_places'));

        // Manejar el almacenamiento de la imagen
        if ($request->hasFile('profile_ph')) {
            $path = $request->file('profile_ph')->store('profiles', 'public');
            $path = storage_path('app/public/profiles');
            chmod($path, 0775);
            $profile->profile_ph = $path;
        }

        // Guardar el perfil en la base de datos
        $profile->save();

        // Asociar lugares de interes adicionales 
        if ($request->has('interest_places')) {
            $profile->interestPlaces()->attach($request->interest_places);
        }

        // Redirigir a la lista con mensaje de éxito
        return redirect()->route('profiles.index')->with('success', 'Perfil creado exitosamente.');
    }

    /**
     * Muestra los detalles de un perfil específico.
     */
    public function show(Profile $profile): View
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Muestra el formulario para editar un perfil existente.
     */
    public function edit(Profile $profile)
    {
        // Obtener datos necesarios para los selects del formulario
        $users = User::all()->pluck('name', 'id');
        $interestPlaces = InterestPlace::all()->pluck('name', 'id');
        $configurations = Configuration::all()->pluck('name', 'id');
        return view('profiles.edit', compact('profile', 'users', 'interestPlaces', 'configurations'));
    }

    /**
     * Actualiza un perfil en la base de datos.
     */
    public function update(Request $request, Profile $profile)
    {
        // Validar los datos del formulario
        $request->validate([
            'gender' => 'nullable|string|max:20',
            'profile_ph' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'nickname' => 'required|string|max:50|unique:profiles,nickname,' . $profile->id,
            'cyclist_type' => 'required|string|max:50',
            'busy_routes' => 'nullable|integer|min:0',
            'achievements' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'interest_place_id' => 'nullable|exists:interest_places,id',
            'configuration_id' => 'nullable|exists:configurations,id',
            'interest_places' => 'nullable|array',
        ]);

        // Actualizar los datos del perfil 
        $profile->fill($request->except('profile_ph', 'interest_places'));

        // Si se subió nueva imagen, eliminar la anterior y guardar la nueva
        if ($request->hasFile('profile_ph')) {
            if ($profile->profile_ph) {
                Storage::disk('public')->delete($profile->profile_ph);
            }
            $path = $request->file('profile_ph')->store('profiles', 'public');
            $profile->profile_ph = $path;
        }

        // Guardar los cambios del perfil
        $profile->save();

        // Sincronizar lugares de interés adicionales
        if ($request->has('interest_places')) {
            $profile->interestPlaces()->sync($request->interest_places);
        } else {
            $profile->interestPlaces()->detach(); // Eliminar asociaciones si se eliminan del formulario
        }

        // Redirigir a la lista con mensaje de éxito
        return redirect()->route('profiles.index')->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Elimina un perfil de la base de datos.
     */
    public function destroy(Profile $profile)
    {
        // Eliminar la foto del almacenamiento si existe
        if ($profile->profile_ph) {
            Storage::disk('public')->delete($profile->profile_ph);
        }

        // Eliminar el perfil
        $profile->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('profiles.index')->with('success', 'Perfil eliminado exitosamente.');
    }
}
