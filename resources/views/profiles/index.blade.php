@extends('layouts.appHome')

@section('title', 'profiles')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-blue-200 to-blue-500 text-white">
            <h2 class="text-xl font-semibold">Explora los Perfiles de Ciclistas</h2>
            <p class="text-sm mt-1">Descubre y conecta con otros apasionados del ciclismo.</p>
        </div>

        <div class="p-6">
            <div class="mb-4">
                <a href="{{ route('profiles.create') }}" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-full shadow-md transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Crear Nuevo Perfil
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($profiles as $profile)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="relative">
                            @if ($profile->profile_ph)
                                <img src="{{ asset('storage/' . $profile->profile_ph) }}" alt="{{ $profile->nickname }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-2 right-2 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $profile->cyclist_type }}</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $profile->nickname }}</h3>
                            <p class="text-sm text-gray-600 mt-1">Usuario: {{ $profile->user->name }}</p>
                            @if ($profile->description)
                                <p class="text-gray-700 mt-2 text-sm">{{ Str::limit($profile->description, 60) }}</p>
                            @endif
                            <div class="mt-3 flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <a href="{{ route('profiles.show', $profile) }}" class="inline-flex items-center text-indigo-500 hover:text-indigo-700 font-semibold text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7 1.274 4.057-1.178 8.93-4.968 10.684-3.79-1.754-7.589-4.608-12-4.608-4.411 0-8.2 2.854-11.99 4.608-3.79 1.754-6.242 6.627-4.968 10.684z" />
                                        </svg>
                                        Ver
                                    </a>
                                    <a href="{{ route('profiles.edit', $profile) }}" class="inline-flex items-center text-yellow-500 hover:text-yellow-700 font-semibold text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828 9 13.001l-1.414 1.414L10.586 17.243" />
                                        </svg>
                                        Editar
                                    </a>
                                </div>
                                <form action="{{ route('profiles.destroy', $profile) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center text-red-500 hover:text-red-700 font-semibold text-sm focus:outline-none" onclick="return confirm('¿Estás seguro de eliminar este perfil?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-600">Aún no hay perfiles registrados. ¡Crea el primero!</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $profiles->links() }}
            </div>
        </div>
    </div>
@endsection