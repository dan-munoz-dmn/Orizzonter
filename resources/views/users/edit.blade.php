@extends('layouts.appHome')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar usuario</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded-xl p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500"
                   required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500"
                   required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Agrega aquí más campos si los necesitas, como username, role, etc. --}}

        <div class="flex justify-end space-x-4">
            <a href="{{ route('users.index') }}"
               class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                Cancelar
            </a>
            <button type="submit"
                    class="px-6 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition">
                Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection
