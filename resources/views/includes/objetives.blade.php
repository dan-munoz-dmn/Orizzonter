<div x-data="{ openModal: null }" class="bg-gradient-to-br from-sky-200 to-gray-100 h-[700px] flex flex-col items-center justify-center gap-12 py-20">
    <h2 class="text-5xl font-bold text-gray-800 mb-12 tracking-tight">
        Objetivos
    </h2>

    <div class="flex gap-16 flex-wrap justify-center">
        @foreach ([
            ['id' => 1, 'title' => 'Tecnología', 'content' => 'Este es el contenido del primer modal.', 'image' => 'https://diariodigital.ujaen.es/sites/default/files/imagen/2020-01/np_foto_UJA_TIC_personas_mayores.jpg'],
            ['id' => 2, 'title' => 'Seguridad', 'content' => 'Aquí va el texto del segundo modal.', 'image' => 'https://www.datos101.com/wp-content/uploads/2023/12/seguridad-informatica.png'],
            ['id' => 3, 'title' => 'Experiencia', 'content' => 'Y este es el último, el tercer modal.', 'image' => 'https://static.platzi.com/media/user_upload/Midudev%20%282%29-9a5c0918-6c7d-4c81-aee7-44be5c5fb310.jpg'],
        ] as $modal)
            <button
                @click="openModal = {{ $modal['id'] }}"
                class="relative w-52 h-52 rounded-full bg-white shadow-md hover:shadow-lg transition duration-300 transform hover:scale-110 flex items-center justify-center overflow-hidden group"
            >
                <img src="{{ $modal['image'] }}" alt="{{ $modal['title'] }}" class="w-full h-full object-cover rounded-full transition duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 group-hover:bg-black/40 transition duration-300 flex items-center justify-center">
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