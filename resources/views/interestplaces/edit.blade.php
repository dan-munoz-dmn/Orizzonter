@extends('layouts.appHome')

@section('title', 'Editar Lugar')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Editar Lugar</h1>

    <form action="{{ route('interestplaces.update', $interestplace->id) }}" method="POST" class="bg-white text-black p-8 rounded-xl shadow-lg space-y-6">
        @csrf
        @method('PUT')

        <x-input label="Nombre" name="name" value="{{ old('name', $interestplace->name) }}" required />
        <x-input label="Tipo" name="place_type" value="{{ old('place_type', $interestplace->place_type) }}" required />
        <x-input label="Ubicación" name="location" value="{{ old('location', $interestplace->location) }}" required />
        <x-textarea label="Descripción" name="description" value="{{ old('description', $interestplace->description) }}" required />

        <div class="flex justify-between">
            <a href="{{ route('interestplaces.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-300">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition duration-300">
                Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection
