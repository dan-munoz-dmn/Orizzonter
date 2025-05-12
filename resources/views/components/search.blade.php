@props([
    'action' => route('users.index'),
    'placeholder' => 'Buscar...',
    'name' => 'search',
    'value' => request('search'),
])

<form method="GET" action="{{ $action }}" class="flex items-center">
    <div class="flex-1 relative rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input
            type="text"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            class="w-full rounded-md border-0 py-3 pl-10 pr-10 bg-white/90 text-gray-900 placeholder:text-gray-500 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none"
        />
        <div class="absolute inset-y-0 right-0 flex items-center">
             <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-md px-6 py-3 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2">
                Buscar
            </button>
        </div>
    </div>
</form>
