<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Muestra una lista de todas las estadísticas.
     * Incluye la relacion con el modelo User para mostrar informacion del usuario.
     */
    public function index()
    {
        $statistics = Statistic::with('user')->get();
        return view('statistics.index', compact('statistics'));
    }

    /**
     * Muestra el formulario para crear una nueva estadistica.
     */
    public function create()
    {
        return view('statistics.create');
    }

    /**
     * Almacena una nueva estadistica en la base de datos.
     */
    public function store(Request $request)
    {
        // Validacion de los datos del formulario
        $validated = $request->validate([
            'total_rides' => 'required|integer',
            'total_distance' => 'required|numeric',
            'total_time' => 'required|integer',
            'calories_burned' => 'required|numeric',
            'average_speed' => 'required|numeric',
            'user_id' => 'required|exists:users,id', // Se asegura de que el usuario exista
        ]);

        // Se asegura de que el user_id corresponde al usuario autenticado
        $validated['user_id'] = auth()->id();

        // Crea una nueva estadistica con los datos validados
        Statistic::create($validated);

        // Redirige al indice con un mensaje de exito
        return redirect()->route('statistics.index')->with('success', 'Estadística creada correctamente');
    }

    /**
     * Muestra el formulario para editar una estadistica específica.
     */
    public function edit(Statistic $statistic)
    {
        return view('statistics.edit', compact('statistic'));
    }

    /**
     * Actualiza una estadistica especifica en la base de datos.
     */
    public function update(Request $request, Statistic $statistic)
    {
        // Validacion de los datos actualizados
        $request->validate([
            'total_rides' => 'required|integer',
            'total_distance' => 'required|numeric',
            'total_time' => 'required|integer',
            'calories_burned' => 'required|numeric',
            'average_speed' => 'required|numeric',
        ]);

        // Actualiza la estadistica con los nuevos valores
        $statistic->update($request->all());

        // Redirige al indice con un mensaje de exito
        return redirect()->route('statistics.index')->with('success', 'Estadística actualizada correctamente.');
    }

    /**
     * Elimina una estadistica especifica de la base de datos.
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        // Redirige al indice con un mensaje de exito
        return redirect()->route('statistics.index')->with('success', 'Estadística eliminada correctamente.');
    }
}
