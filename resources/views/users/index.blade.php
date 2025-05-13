@extends('layouts.appHome')

    @section('search_content')
            @include('components.search')
    @endsection
    
@section('content')
    <div class="container mx-auto px-6 py-8">
        {{-- Botones de vista --}}
        <div class="flex justify-end mb-4">
            <button id="view-cards" class="p-2 text-gray-500 hover:text-blue-600 focus:outline-none rounded-md transition-colors">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6H20M4 12H20M4 18H20"></path>
                </svg>
                <span class="sr-only">Vista de Tarjetas</span>
            </button>
            <button id="view-list" class="p-2 text-gray-500 hover:text-blue-600 focus:outline-none rounded-md transition-colors ml-2">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path>
                </svg>
                <span class="sr-only">Vista de Lista</span>
            </button>
        </div>

        {{-- Contenedor de la lista de usuarios --}}
        <div id="user-list-container" class="view-cards">
            <div class="view-cards-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($users as $user)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:scale-[1.02]">
                        <div class="relative">
                            <img src="https://source.unsplash.com/random/300x200/?user&{{ $user->id }}" alt="{{ $user->name }}" class="w-full h-48 object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-20 flex items-end">
                                <h3 class="text-xl font-semibold text-white p-4">{{ $user->name }}</h3>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-600">Email: <span class="font-medium text-blue-500">{{ $user->email }}</span></p>
                            <p class="text-gray-600 mt-2">Rol: <span class="font-medium text-green-500">{{ $user->role }}</span></p>
                            <div class="mt-4">
                                <a href="{{ route('users.show', $user) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-md hover:from-blue-600 hover:to-purple-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M19.334 10.666a8 8 0 01-16 0c0-4.418 3.582-8 8-8s8 3.582 8 8zM4 10a6 6 0 1112 0 6 6 0 01-12 0z" />
                                    </svg>
                                    Ver Perfil
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Aquí vamos a incluir el contenido de la lista pero oculto inicialmente --}}
        <div id="list-view-content" class="hidden list-view-container bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rol
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Ver</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full overflow-hidden mr-4">
                                        <img src="https://source.unsplash.com/random/40x40/?user&{{ $user->id }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                    </div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500">{{ $user->role }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('users.show', $user) }}" class="text-indigo-600 hover:text-indigo-800 hover:underline">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="mt-8">
            {{ $users->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cardViewButton = document.getElementById('view-cards');
            const listViewButton = document.getElementById('view-list');
            const userListContainer = document.getElementById('user-list-container');
            const listViewContent = document.getElementById('list-view-content');

            // Guardamos una referencia al contenedor de las cards
            const cardViewContainer = document.querySelector('.view-cards-container');

            cardViewButton.addEventListener('click', function() {
                userListContainer.classList.remove('view-list');
                userListContainer.classList.add('view-cards');
                // Restaurar el contenido original (vista de tarjetas)
                userListContainer.innerHTML = cardViewContainer.outerHTML;
            });

            listViewButton.addEventListener('click', function() {
                userListContainer.classList.remove('view-cards');
                userListContainer.classList.add('view-list');
                // Cargar el contenido de la vista de lista
                userListContainer.innerHTML = listViewContent.innerHTML;
            });
        });
    </script>
@endsection
