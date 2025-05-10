<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $statistics = Statistic::with('user')->get();
    return view('statistics.index', compact('statistics'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // Validación de los datos del formulario
    $validated = $request->validate([
        'total_rides' => 'required|integer',
        'total_distance' => 'required|numeric',
        'total_time' => 'required|integer',
        'calories_burned' => 'required|numeric',
        'average_speed' => 'required|numeric',
        'user_id' => 'required|exists:users,id',  // Validar que user_id existe en la tabla users
    ]);

    $validated['user_id'] = auth()->id(); // Aquí se asigna el ID del usuario autenticado

    // Crear la estadística
    Statistic::create($validated);

    // Redirigir a la vista de estadísticas con un mensaje de éxito
    return redirect()->route('statistics.index')->with('success', 'Estadística creada correctamente');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        return view('statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistic $statistic)
    {
        // Validar los datos
        $request->validate([
            'total_rides' => 'required|integer',
            'total_distance' => 'required|numeric',
            'total_time' => 'required|integer',
            'calories_burned' => 'required|numeric',
            'average_speed' => 'required|numeric',
        ]);

        // Actualizar la estadística
        $statistic->update($request->all());

        return redirect()->route('statistics.index')->with('success', 'Estadística actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('statistics.index')->with('success', 'Estadística eliminada correctamente.');
    }
}
