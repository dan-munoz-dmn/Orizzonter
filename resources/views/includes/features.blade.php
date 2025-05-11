<section class="py-20 bg-gradient-to-b from-white to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">
            Nuestras Herramientas
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 ">
            @php
                $tools = [
                    [
                        'title' => 'Montañas Majestuosas',
                        'description' => 'Explorá cumbres nevadas y aire puro en cada rincón.',
                        'image' => asset('images/prueba.png'),
                    ],
                    [
                        'title' => 'Ciudades Vibrantes',
                        'description' => 'Sumergite en el dinamismo y cultura de grandes urbes.',
                        'image' => asset('images/prueba.png'),
                    ],
                    [
                        'title' => 'Playas Paradisíacas',
                        'description' => 'Relax garantizado en arenas blancas y aguas cristalinas.',
                        'image' => asset('images/prueba.png'),
                    ],
                    [
                        'title' => 'Bosques Encantados',
                        'description' => 'Naturaleza densa y misteriosa para reconectar.',
                        'image' => asset('images/prueba.png'),
                    ],
                    [
                        'title' => 'Desiertos Místicos',
                        'description' => 'Explorá paisajes áridos llenos de historia y calor.',
                        'image' => asset('images/prueba.png'),
                    ],
                    [
                        'title' => 'Aventuras en el Ártico',
                        'description' => 'Desafía el hielo y descubrí la belleza polar.',
                        'image' => asset('images/prueba.png'),
                    ],
                ];
            @endphp

            @foreach ($tools as $tool)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ $tool['image'] }}" alt="{{ $tool['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $tool['title'] }}</h3>
                        <p class="text-gray-600 text-sm">{{ $tool['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>