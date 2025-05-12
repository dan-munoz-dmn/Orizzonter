<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User; // Asegúrate de importar el modelo User
use App\Models\InterestPlace; // Asegúrate de importar el modelo InterestPlace
use App\Models\Configuration; // Asegúrate de importar el modelo Configuration
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Para manejar la carga de archivos

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::with(['user', 'interestPlaces', 'configuration'])->latest()->paginate(10);
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->pluck('name', 'id'); // Obtener usuarios para el select
        $interestPlaces = InterestPlace::all()->pluck('name', 'id'); // Obtener lugares de interés
        $configurations = Configuration::all()->pluck('name', 'id'); // Obtener configuraciones
        return view('profiles.create', compact('users', 'interestPlaces', 'configurations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'nullable|string|max:20',
            'profile_ph' => 'nullable|image|max:2048', // Ejemplo de validación para la imagen
            'description' => 'nullable|string',
            'nickname' => 'required|string|max:50|unique:profiles,nickname',
            'cyclist_type' => 'required|string|max:50',
            'busy_routes' => 'nullable|integer|min:0',
            'achievements' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'interest_place_id' => 'nullable|exists:interest_places,id',
            'configuration_id' => 'nullable|exists:configurations,id',
            'interest_places' => 'nullable|array', // Para la relación muchos a muchos
        ]);

        $profile = new Profile($request->except('profile_ph', 'interest_places'));

        if ($request->hasFile('profile_ph')) {
            $path = $request->file('profile_ph')->store('profiles', 'public');
            // investigar sobre esto
            $path = storage_path('app/public/profiles');
            chmod($path, 0775);
            $profile->profile_ph = $path;
        }

        $profile->save();

        if ($request->has('interest_places')) {
            $profile->interestPlaces()->attach($request->interest_places);
        }

        return redirect()->route('profiles.index')->with('success', 'Perfil creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile): View
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $users = User::all()->pluck('name', 'id');
        $interestPlaces = InterestPlace::all()->pluck('name', 'id');
        $configurations = Configuration::all()->pluck('name', 'id');
        return view('profiles.edit', compact('profile', 'users', 'interestPlaces', 'configurations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
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

        $profile->fill($request->except('profile_ph', 'interest_places'));

        if ($request->hasFile('profile_ph')) {
            // Eliminar la foto anterior si existe
            if ($profile->profile_ph) {
                Storage::disk('public')->delete($profile->profile_ph);
            }
            $path = $request->file('profile_ph')->store('profiles', 'public');
            $profile->profile_ph = $path;
        }

        $profile->save();

        if ($request->has('interest_places')) {
            $profile->interestPlaces()->sync($request->interest_places);
        } else {
            $profile->interestPlaces()->detach();
        }

        return redirect()->route('profiles.index')->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        // Eliminar la foto si existe antes de eliminar el perfil
        if ($profile->profile_ph) {
            Storage::disk('public')->delete($profile->profile_ph);
        }
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Perfil eliminado exitosamente.');
    }
}