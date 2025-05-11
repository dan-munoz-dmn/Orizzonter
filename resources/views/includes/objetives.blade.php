<div x-data="{ openModal: null }" class="bg-gradient-to-br from-sky-100 to-indigo-100 h-[700px] flex flex-col items-center justify-center gap-12 py-20">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-12 tracking-tight">
        Nuestros faros guía
    </h2>

    <div class="flex gap-16 flex-wrap justify-center">
        @foreach ([
            ['id' => 1, 'title' => 'Modal Uno', 'content' => 'Este es el contenido del primer modal.', 'image' => 'https://via.placeholder.com/150/64B5F6/FFFFFF?text=1&textColor=000000'],
            ['id' => 2, 'title' => 'Modal Dos', 'content' => 'Aquí va el texto del segundo modal.', 'image' => 'https://via.placeholder.com/150/4DB6AC/FFFFFF?text=2&textColor=000000'],
            ['id' => 3, 'title' => 'Modal Tres', 'content' => 'Y este es el último, el tercer modal.', 'image' => 'https://via.placeholder.com/150/FFCA28/FFFFFF?text=3&textColor=000000'],
        ] as $modal)
            <button
                @click="openModal = {{ $modal['id'] }}"
                class="relative w-40 h-40 rounded-full bg-white shadow-md hover:shadow-lg transition duration-300 transform hover:scale-110 flex items-center justify-center overflow-hidden group"
            >
                <img src="{{ $modal['image'] }}" alt="{{ $modal['title'] }}" class="w-full h-full object-cover rounded-full transition duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-white group-hover:bg-black/40 transition duration-300 flex items-center justify-center">
                    <span class="text-white font-semibold text-lg opacity-0 group-hover:opacity-100 transition duration-300">{{ $modal['title'] }}</span>
                </div>
            </button>
        @endforeach
    </div>

    @foreach ([
        ['id' => 1, 'title' => 'Modal Uno', 'content' => 'Este es el contenido del primer modal.'],
        ['id' => 2, 'title' => 'Modal Dos', 'content' => 'Aquí va el texto del segundo modal.'],
        ['id' => 3, 'title' => 'Modal Tres', 'content' => 'Y este es el último, el tercer modal.'],
    ] as $modal)
        <div
            x-show="openModal === {{ $modal['id'] }}"
            x-transition
            @click="openModal = null"
            class="fixed inset-0 bg-black/30 backdrop-blur-md flex items-center justify-center z-50"
        >
            <div
                @click.stop
                class="bg-white p-8 rounded-xl shadow-xl relative w-96 max-w-full"
            >
                <button
                    @click="openModal = null"
                    class="absolute top-4 right-5 text-gray-500 hover:text-red-600 text-xl font-bold"
                >
                    ✕
                </button>
                <h3 class="text-3xl font-bold mb-6 text-indigo-700">{{ $modal['title'] }}</h3>
                <p class="text-gray-700 leading-relaxed">{{ $modal['content'] }}</p>
            </div>
        </div>
    @endforeach
</div>