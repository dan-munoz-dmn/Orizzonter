@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-8 bg-white text-black rounded-3xl shadow-lg">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Crear  lugar de interes</h2>

        <form action="{{ route('interestplaces.store') }}" method="POST">
            @csrf
            <x-input name="name" label="Nombre" required />
            <x-input name="place_type" label="Tipo de terreno" required />
            <x-input name="location" label="Ubicación" required />
            <x-textarea name="description" label="Descripción" required />

            <button type="submit" class="mt-6 w-full px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
                Guardar
            </button>
        </form>
    </div>
@endsection
