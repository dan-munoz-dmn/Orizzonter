@extends ('layouts.appHome')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container mx-auto px-6 py-8">

    {{-- Barra de búsqueda --}}
    <div class="items-center">
        @include('components.search')
    </div>
            <div>
            <button id="view-cards" class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6H20M4 12H20M4 18H20"></path></svg>
            </button>
            <button id="view-list" class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path></svg>
            </button>
        </div>

    {{-- Contenedor de la lista de usuarios (la clase 'user-list-container' será clave) --}}
    <div id="user-list-container" class="view-cards">
        <div class="view-cards-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @include('includes.user-card', ['users' => $users])
        </div>
    </div>

    {{-- Paginación --}}
    <div class="mt-8">
        {{ $users->links() }}
    </div>
    {{-- Aquí vamos a incluir el contenido de la lista pero oculto inicialmente --}}
    <div id="list-view-content" class="hidden list-view-container">
        @include('includes.user-list', ['users' => $users])
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
