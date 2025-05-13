@extends('layouts.appHome')

@section('title', 'Crear Estadística')

@section('content')
<!-- Contenedor principal centrado -->
<div class="container mx-auto px-4 py-8 max-w-3xl animate-fade-in-up">
    <!-- Tarjeta del formulario -->
    <div class="bg-white shadow-2xl rounded-2xl p-10 animate-zoom-in">
        <!-- Titulo del formulario -->
        <h1 class="text-4xl font-extrabold text-center text-orange-600 mb-8 animate-pulse">🚀 Crear Estadística 🚴‍♂️</h1>

        <!-- Formulario para crear una nueva estadística -->
        <form action="{{ route('statistics.store') }}" method="POST" class="space-y-6">
            @csrf
            <!--  ID del usuario autenticado -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <!--  Total de viajes -->
            <div class="transition duration-300 hover:scale-[1.01]">
                <label for="total_rides" class="block text-lg font-semibold text-gray-800 mb-1">Total de viajes</label>
                <input type="number" id="total_rides" name="total_rides"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 text-black focus:ring-2 focus:ring-orange-500 focus:outline-none shadow-sm transition" required>
            </div>

            <!--  Distancia total -->
            <div class="transition duration-300 hover:scale-[1.01]">
                <label for="total_distance" class="block text-lg font-semibold text-gray-800 mb-1">Distancia total (km)</label>
                <input type="number" step="0.01" id="total_distance" name="total_distance"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 text-black focus:ring-2 focus:ring-orange-500 focus:outline-none shadow-sm transition" required>
            </div>

            <!--  Tiempo total -->
            <div class="transition duration-300 hover:scale-[1.01]">
                <label for="total_time" class="block text-lg font-semibold text-gray-800 mb-1">Tiempo total (min)</label>
                <input type="number" id="total_time" name="total_time"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 text-black focus:ring-2 focus:ring-orange-500 focus:outline-none shadow-sm transition" required>
            </div>

            <!--  Calorías quemadas -->
            <div class="transition duration-300 hover:scale-[1.01]">
                <label for="calories_burned" class="block text-lg font-semibold text-gray-800 mb-1">Calorías quemadas</label>
                <input type="number" step="0.01" id="calories_burned" name="calories_burned"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 text-black focus:ring-2 focus:ring-orange-500 focus:outline-none shadow-sm transition" required>
            </div>

            <!--  Velocidad promedio -->
            <div class="transition duration-300 hover:scale-[1.01]">
                <label for="average_speed" class="block text-lg font-semibold text-gray-800 mb-1">Velocidad promedio (km/h)</label>
                <input type="number" step="0.01" id="average_speed" name="average_speed"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 text-black focus:ring-2 focus:ring-orange-500 focus:outline-none shadow-sm transition" required>
            </div>
            <!-- botones de cancelar y Crear -->
            <div class="flex justify-between items-center pt-8 animate-fade-in-down">
                <!-- Boton de cancelar -->
                <a href="{{ route('statistics.index') }}"
                   class="text-gray-700 font-medium bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                    ⬅️ Cancelar
                </a>
                <!-- Botón para enviar el formulario -->
                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105">
                    ✅ Crear Estadística
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
