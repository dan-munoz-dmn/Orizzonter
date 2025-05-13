@extends('layouts.appHome')

@section('content')
    <div class="max-w-3xl mx-auto p-8 bg-gradient-to-r from-blue-100 to-indigo-200 text-black rounded-3xl shadow-xl">
        <!-- Titulo de la pagina -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Crear lugar de interés</h2>

        <!-- Formulario para crear un nuevo lugar de interes -->
        <form action="{{ route('interestplaces.store') }}" method="POST">
            @csrf 

            <!-- Campos del formulario  -->
            <x-input name="name" label="Nombre" required class="border-2 border-blue-300 rounded-lg p-3 mb-4"/>
            
            <!-- Campos del formulario  -->
            <x-input name="place_type" label="Tipo de terreno" required class="border-2 border-blue-300 rounded-lg p-3 mb-4"/>
            
            <!-- Campos del formulario  -->
            <x-input name="location" label="Ubicación" required class="border-2 border-blue-300 rounded-lg p-3 mb-4"/>
            
            <!-- Campos del formulario  -->
            <x-textarea name="description" label="Descripción" required class="border-2 border-blue-300 rounded-lg p-3 mb-4"/>

            <!-- Boton para enviar el formulario -->
            <button type="submit"
                    class="w-full px-6 py-3 bg-gradient-to-r from-indigo-400 to-blue-500 text-white rounded-lg hover:bg-gradient-to-l from-indigo-500 to-blue-600 transition duration-300 shadow-md mt-6">
                Guardar
            </button>
        </form>
    </div>
@endsection
