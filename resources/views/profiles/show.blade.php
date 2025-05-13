@extends('layouts.appHome')

@section('content')
    <div class="container mx-auto mt-8 p-6 rounded-lg bg-white shadow-lg border border-gray-200">
        <div class="flex flex-col md:flex-row items-center justify-between mb-8">
            <div class="flex items-center mb-4 md:mb-0">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-purple-500 shadow-md">
                    @if ($profile->profile_ph)
                        <img src="{{ asset('storage/' . $profile->profile_ph) }}" alt="Foto de Perfil" class="w-full h-full object-cover">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Foto de Perfil por defecto" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="ml-6">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $profile->nickname }}</h1>
                    <p class="text-lg text-gray-700">Tipo de Ciclista: <span class="font-semibold text-purple-600">{{ $profile->cyclist_type }}</span></p>
                    @if ($profile->user)
                        <p class="text-sm text-gray-500">Usuario: <span class="font-medium text-blue-600">{{ $profile->user->name }}</span></p>
                    @endif
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('profiles.edit', $profile) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2.5 px-5 rounded-lg transition duration-300 ease-in-out shadow-md">
                    <i class="fas fa-edit mr-2"></i> Editar Perfil
                </a>
                <form action="{{ route('profiles.destroy', $profile) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este perfil?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2.5 px-5 rounded-lg transition duration-300 ease-in-out shadow-md">
                        <i class="fas fa-trash-alt mr-2"></i> Eliminar Perfil
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4 border-b-2 border-purple-300 pb-2">Información General</h2>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                        <p class="text-sm font-medium text-gray-700">Género:</p>
                        <p class="text-lg text-gray-900">{{ $profile->gender ?? 'No especificado' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                        <p class="text-sm font-medium text-gray-700">Rutas Concurridas:</p>
                        <p class="text-lg text-gray-900">{{ $profile->busy_routes ?? '0' }}</p>
                    </div>
                    @if ($profile->configuration)
                        <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                            <p class="text-sm font-medium text-gray-700">Configuración:</p>
                            <p class="text-lg text-gray-900"><span class="font-medium text-green-600">{{ $profile->configuration->name }}</span></p>
                        </div>
                    @endif
                     @if ($profile->interestPlace)
                        <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                            <p class="text-sm font-medium text-gray-700">Lugar de Interés Principal:</p>
                            <p class="text-lg text-gray-900"><span class="font-medium text-indigo-600">{{ $profile->interestPlace->name }}</span></p>
                        </div>
                    @endif
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4 border-b-2 border-purple-300 pb-2">Descripción y Logros</h2>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                        <p class="text-sm font-medium text-gray-700">Descripción:</p>
                        <p class="text-lg text-gray-900 whitespace-pre-line">{{ $profile->description ?? 'No hay descripción.' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                        <p class="text-sm font-medium text-gray-700">Logros:</p>
                        <p class="text-lg text-gray-900 whitespace-pre-line">{{ $profile->achievements ?? 'No hay logros registrados.' }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if ($profile->interestPlaces->isNotEmpty())
            <div class="mt-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4 border-b-2 border-purple-300 pb-2">Lugares de Interés Adicionales</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($profile->interestPlaces as $place)
                        <div class="bg-gray-50 rounded-lg p-4 shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold text-purple-700">{{ $place->name }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
         <div class="mt-8 text-center">
            <a href="{{ route('profiles.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded-full transition duration-300 ease-in-out shadow-md">
                <i class="fas fa-arrow-left mr-3"></i> Volver a la Lista de Perfiles
            </a>
        </div>
    </div>
@endsection
