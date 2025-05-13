@extends('layouts.appHome')

@section('content')
    <div class="bg-white dark:bg-gray-800 rounded-md shadow overflow-hidden">
        <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Detalles del Perfil: {{ $profile->nickname }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
                Información detallada del perfil.
            </p>
        </div>
        <div class="p-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @if ($profile->profile_ph)
                    <div class="col-span-1">
                        <img src="{{ asset('storage/' . $profile->profile_ph) }}" alt="Foto de Perfil" class="rounded-md shadow-md w-full h-auto object-cover">
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">Foto de Perfil</p>
                    </div>
                @endif
                <div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Nickname:</span>
                    <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->nickname }}</p>
                </div>
                <div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Usuario:</span>
                    <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->user->name }}</p>
                </div>
                <div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Género:</span>
                    <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->gender ?? 'No especificado' }}</p>
                </div>
                <div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Ciclista:</span>
                    <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->cyclist_type }}</p>
                </div>
                <div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Rutas Concurridas:</span>
                    <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->busy_routes }}</p>
                </div>
                @if ($profile->interestPlace)
                    <div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Lugar de Interés Principal:</span>
                        <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->interestPlace->name ?? 'No asignado' }}</p>
                    </div>
                @endif
                @if ($profile->configuration)
                    <div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Configuración:</span>
                        <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->configuration->name ?? 'No asignada' }}</p>
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Descripción:</span>
                <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->description ?? 'No hay descripción.' }}</p>
            </div>

            <div class="mt-4">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Logros:</span>
                <p class="mt-1 text-gray-900 dark:text-white">{{ $profile->achievements ?? 'No hay logros registrados.' }}</p>
            </div>

            @if ($profile->interestPlaces->isNotEmpty())
                <div class="mt-4">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Lugares de Interés Adicionales:</span>
                    <ul class="list-disc list-inside mt-1 text-gray-900 dark:text-white">
                        @foreach ($profile->interestPlaces as $interestPlace)
                            <li>{{ $interestPlace->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('profiles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Volver a la Lista
                </a>
                <a href="{{ route('profiles.edit', $profile) }}" class="ml-2 inline-flex items-center px-4 py-2 bg-yellow-500 dark:bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Editar
                </a>
            </div>
        </div>
    </div>
@endsection