@extends('layouts.appHome')

@section('title', 'Lugares de Interés')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-right mb-6">
        <a href="{{ route('interestplaces.create') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
            + Nuevo lugar
        </a>
    </div>

    @if($interestplaces->isEmpty())
        <p class="text-center text-gray-500">No hay lugares de interés registrados.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($interestplaces as $place)
                <div class="bg-white text-black rounded-3xl shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $place->name }}</h2>
                    <p class="text-sm text-gray-500 mb-2">{{ $place->place_type }}</p>
                    <p class="text-gray-600 mb-4">{{ Str::limit($place->description, 100) }}</p>
                    <p class="text-sm text-gray-400">{{ $place->location }}</p>

                    <div class="mt-4 flex space-x-4">
                        <a href="{{ route('interestplaces.edit', $place->id) }}"
                           class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                            Editar
                        </a>

                        <form action="{{ route('interestplaces.destroy', $place->id) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar este lugar?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
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
