@extends('layouts.appHome')

@section('title', 'Estadísticas')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl animate-fade-in">

    <!-- Título principal -->
    <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center tracking-tight animate-bounce">
        📊 Estadísticas
    </h1>

    <!-- Mostrar mensaje de éxito si existe -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-lg shadow-md transition duration-500 ease-in-out animate-fade-in-down">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de estadísticas -->
    <div class="overflow-x-auto shadow-xl rounded-2xl border border-gray-200 animate-fade-in-up">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <!-- Encabezados de tabla -->
            <thead class="bg-gradient-to-r from-orange-100 to-orange-200 text-black uppercase text-sm tracking-wider">
                <tr>
                    <th class="py-4 px-6">Viajes Totales</th>
                    <th class="py-4 px-6">Distancia Total</th>
                    <th class="py-4 px-6">Tiempo Total</th>
                    <th class="py-4 px-6">Calorías Quemadas</th>
                    <th class="py-4 px-6">Velocidad Promedio</th>
                    <th class="py-4 px-6">Usuario</th>
                    <th class="py-4 px-6">Acciones</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-100">
                <!-- Filas de estadísticas -->
                @foreach ($statistics as $statistic)
                    <tr class="hover:bg-orange-50 transition-all duration-300 transform hover:scale-[1.01]">
                        <td class="py-3 px-6 text-gray-700 font-medium">{{ $statistic->total_rides }}</td>
                        <td class="py-3 px-6 text-gray-700">{{ $statistic->total_distance }} km</td>
                        <td class="py-3 px-6 text-gray-700">{{ $statistic->total_time }} min</td>
                        <td class="py-3 px-6 text-gray-700">{{ $statistic->calories_burned }} kcal</td>
                        <td class="py-3 px-6 text-gray-700">{{ $statistic->average_speed }} km/h</td>
                        <!-- Mostrar nombre del usuario o mensaje por defecto -->
                        <td class="py-3 px-6 text-gray-700">{{ $statistic->user->name ?? 'No asignado' }}</td>
                        <td class="py-3 px-6 flex gap-3">
                            <!-- Editar -->
                            <a href="{{ route('statistics.edit', $statistic->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-200 ease-in-out">
                                ✏️ Editar
                            </a>
                            <!-- Eliminar -->
                            <form action="{{ route('statistics.destroy', $statistic->id) }}" method="POST" 
                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta estadística?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold transition duration-200 ease-in-out">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Botón para crear una nueva estadística -->
    <div class="text-center mt-8">
        <a href="{{ route('statistics.create') }}"
           class="inline-block px-8 py-3 bg-orange-500 text-white font-bold rounded-full shadow-lg transform transition hover:scale-105 hover:bg-orange-600 animate-pulse">
            ➕ Crear Estadística
        </a>
    </div>
</div>
@endsection
