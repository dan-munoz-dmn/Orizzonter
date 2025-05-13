@extends('layouts.appHome')

@section('title', 'Lugares de Interés')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Boton para crear un nuevo lugar -->
    <div class="text-right mb-6">
        <a href="{{ route('interestplaces.create') }}"
           class="bg-gradient-to-r from-indigo-300 to-blue-400 text-white px-6 py-3 rounded-full hover:bg-gradient-to-l from-indigo-400 to-blue-500 transition duration-300 shadow-lg">
            + Nuevo lugar
        </a>
    </div>

    <!-- Verifica si hay lugares registrados -->
    @if($interestplaces->isEmpty())
        <p class="text-center text-gray-500">No hay lugares de interes registrados.</p>
    @else
        <!-- Lista de lugares en un grid responsivo -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($interestplaces as $place)
                <div class="bg-gradient-to-r from-blue-100 to-indigo-200 text-black rounded-3xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <!-- Nombre y tipo del lugar -->
                    <h2 class="text-3xl font-semibold text-gray-800 mb-3">{{ $place->name }}</h2>
                    <p class="text-sm text-indigo-600 mb-2">{{ $place->place_type }}</p>

                    <!-- Descripcion limitada a 100 caracteres -->
                    <p class="text-gray-600 mb-4">{{ Str::limit($place->description, 100) }}</p>

                    <!-- Ubicacion del lugar -->
                    <p class="text-sm text-gray-500 mb-4">{{ $place->location }}</p>

                    <!-- Botones de accion: Editar y Eliminar -->
                    <div class="mt-4 flex space-x-4">
                        <a href="{{ route('interestplaces.edit', $place->id) }}"
                           class="bg-gradient-to-r from-indigo-400 to-blue-500 text-white px-4 py-2 rounded-lg hover:bg-gradient-to-l from-indigo-500 to-blue-600 transition duration-300 shadow-md">
                            Editar
                        </a>

                        <form action="{{ route('interestplaces.destroy', $place->id) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar este lugar?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gradient-to-r from-red-300 to-red-400 text-white px-4 py-2 rounded-lg hover:bg-gradient-to-l from-red-400 to-red-500 transition duration-300 shadow-md">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
