@extends('layouts.appHome')

@section('title', 'Editar Lugar')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <!-- Titulo de la vista -->
    <h1 class="text-5xl font-extrabold text-center text-gray-800 mb-12 tracking-tight hover:text-blue-600 transition-all duration-500 ease-in-out">
        Editar Lugar
    </h1>

    <!--  actualizar el lugar -->
    <form action="{{ route('interestplaces.update', $interestplace->id) }}" method="POST"
          class="bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 p-10 rounded-3xl shadow-xl space-y-8 transform hover:scale-105 transition-all duration-500 ease-in-out">
        @csrf
        @method('PUT') <!-- Usamos PUT para actualizar -->

        <!-- Campos del formulario utilizando componentes reutilizables -->
        <x-input label="Nombre" name="name" value="{{ old('name', $interestplace->name) }}" required 
                 class="border-2 border-blue-300 rounded-lg p-5 focus:outline-none focus:ring-4 focus:ring-blue-500 transition duration-300 transform hover:scale-105" />
        <x-input label="Tipo" name="place_type" value="{{ old('place_type', $interestplace->place_type) }}" required 
                 class="border-2 border-blue-300 rounded-lg p-5 focus:outline-none focus:ring-4 focus:ring-blue-500 transition duration-300 transform hover:scale-105" />
        <x-input label="Ubicación" name="location" value="{{ old('location', $interestplace->location) }}" required 
                 class="border-2 border-blue-300 rounded-lg p-5 focus:outline-none focus:ring-4 focus:ring-blue-500 transition duration-300 transform hover:scale-105" />
        <x-textarea label="Descripción" name="description" value="{{ old('description', $interestplace->description) }}" required 
                    class="border-2 border-blue-300 rounded-lg p-5 focus:outline-none focus:ring-4 focus:ring-blue-500 transition duration-300 transform hover:scale-105" />

        <!-- Botones para cancelar o guardar cambios -->
        <div class="flex justify-between items-center mt-8 space-x-6">
            <a href="{{ route('interestplaces.index') }}"
               class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300 transform hover:scale-110">
                Cancelar
            </a>
            <button type="submit"
                    class="px-8 py-4 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-lg hover:bg-gradient-to-l from-blue-500 to-blue-400 transform hover:scale-105 transition-all duration-300">
                Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection
