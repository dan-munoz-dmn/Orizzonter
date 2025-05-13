<?php

namespace App\Http\Controllers;

use App\Models\InterestPlace;
use Illuminate\Http\Request;

class InterestPlaceController extends Controller    
{
    // Muestra todos los lugares de interes
    public function index()
    {
        $interestplaces = InterestPlace::all();
        return view('interestplaces.index', compact('interestplaces'));
    }

    // Muestra el formulario para crear un nuevo lugar de interes
    public function create()
    {
        return view('interestplaces.create');
    }

    // Guarda un nuevo lugar de interes
    public function store(Request $request)
    {
        // Validacion de los campos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'place_type' => 'required|max:50',
            'location' => 'required|max:191',
        ]);

        // Creacion del nuevo lugar de interes
        InterestPlace::create($validatedData);

        // Redirige con un mensaje de exito
        return redirect()->route('interestplaces.index')->with('success', 'Lugar creado correctamente.');
    }

    // Muestra el formulario para editar un lugar de interes existente
    public function edit(InterestPlace $interestplace)
    {
        return view('interestplaces.edit', compact('interestplace'));
    }

    // Actualiza un lugar de interes existente
    public function update(Request $request, InterestPlace $interestplace)
    {
        // Validacion de los campos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'place_type' => 'required|max:50',
            'location' => 'required|max:191',
        ]);

        // Actualizacion del lugar de interes
        $interestplace->update($validatedData);

        // Redirige con un mensaje de éxito
        return redirect()->route('interestplaces.index')->with('success', 'Lugar actualizado.');
    }

    // Elimina un lugar de interes
    public function destroy(InterestPlace $interestplace)
    {
        // Elimina el lugar de interes
        $interestplace->delete();

        // Redirige con un mensaje de exito
        return redirect()->route('interestplaces.index')->with('success', 'Lugar eliminado.');
    }
}
