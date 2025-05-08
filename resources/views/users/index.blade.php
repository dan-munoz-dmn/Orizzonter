@extends ('layouts.appHome')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Usuarios registrados</h1>

    @if($users->isEmpty())
        <div class="text-center text-gray-600">No hay usuarios por mostrar.</div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                    {{-- Encabezado --}}
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="bg-orange-500 text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-semibold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h2>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                        </div>
                    </div>

                    {{-- Link a perfil --}}
                    <div class="mt-2">
                        <a href="{{ route('users.show', $user->id) }}"
                           class="text-orange-600 hover:text-orange-800 font-medium transition duration-200">
                            Ver perfil →
                        </a>
                    </div>

                    {{-- Botones de acción --}}
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}"
                           class="flex-1 text-center px-4 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition">
                           Editar
                        </a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                              class="flex-1"
                              onsubmit="return confirm('¿Seguro que deseas eliminar a {{ $user->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $users->links() }} {{-- Asegúrate de estar usando paginate() en el controlador --}}
        </div>
    @endif
</div>
@endsection
