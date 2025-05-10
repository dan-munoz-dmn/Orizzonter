@foreach($users as $user)
    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out flex flex-col justify-between">
        <div class="p-6">
            <div class="flex items-center space-x-4 mb-4">
                <div class="bg-indigo-500 text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-semibold">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $user->name }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ route('users.show', $user->id) }}"
                   class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
                    Ver perfil
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800 rounded-b-lg flex space-x-2">
            <a href="{{ route('users.edit', $user->id) }}"
               class="flex-1 text-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-md transition duration-200">
                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828 9 18.656 8.343 17.999l3.656-3.656z"></path></svg>
                Editar
            </a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded-md transition duration-200">
                    <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Eliminar
                </button>
            </form>
        </div>
    </div>
@endforeach