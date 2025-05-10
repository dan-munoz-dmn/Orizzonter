@props(['name', 'label'])

<div class="mb-6">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="4"
        {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-lg bg-gray-100 text-black border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-500 sm:text-sm p-3']) }}
    ></textarea>
</div>
