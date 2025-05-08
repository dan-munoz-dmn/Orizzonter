@props([
    'action' => route('users.index'),
    'placeholder' => 'Buscar...',
    'name' => 'search',
    'value' => request('search'),
])

<form method="GET" action="{{ $action }}" class="mb-4">
    <div class="flex items-center justify-center p-6 h-16 rounded-lg bg-gray-50 dark:bg-gray-800 shadow-sm">
        <input
            type="text"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            class="w-full md:w-2/3 lg:w-1/2 px-4 py-2 rounded-lg bg-white border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none text-gray-800 dark:bg-gray-900 dark:text-white dark:border-gray-600"
        />
        <button type="submit"
                class="ml-2 px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition focus:ring-2 focus:ring-orange-400">
            Buscar
        </button>
    </div>
</form>
