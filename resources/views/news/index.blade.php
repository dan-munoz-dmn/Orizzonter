@extends('layouts.appHome')

@section('title', 'Noticias')

@section('search_content')
    @include('components.search', ['action' => route('announcements.index'), 'placeholder' => 'Buscar noticias...'])
@endsection

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Últimas Noticias</h1>

        <div class="mb-4">
            <a href="{{ route('announcements.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Crear Noticia
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cerrar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($announcements as $announcement)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:scale-[1.02]">
                    @if ($announcement->image_url)
                        <img class="w-full h-48 object-cover" src="{{ $announcement->image_url }}" alt="{{ $announcement->title }}">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No hay imagen disponible</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $announcement->title }}</h2>
                        <p class="text-gray-600 text-sm mb-2">Categoría: <span class="font-medium text-blue-500">{{ $announcement->category }}</span></p>
                        <p class="text-gray-600 text-sm mb-2">Publicado por: <span class="font-medium text-green-500">{{ $announcement->moderator->name }}</span></p>
                        <p class="text-gray-700 mb-4 line-clamp-3">{{ $announcement->content }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('announcements.show', $announcement->id) }}" class="text-blue-500 hover:text-blue-700 hover:underline">Ver detalles</a>
                            <div class="text-gray-500 text-sm">
                                Publicado: {{ $announcement->created_at->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $announcements->links() }}
        </div>
    </div>
@endsection
