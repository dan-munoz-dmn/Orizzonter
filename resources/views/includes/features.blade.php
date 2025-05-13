<section class="py-20 bg-gradient-to-b from-white to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">
            Nuestras Herramientas
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 ">
            @php
                $tools = [
                    [
                        'title' => 'Comunidad',
                        'description' => 'Divierte con nuevas personas y entrate en nuevas aventuras.',
                        'image' => ('https://images.unsplash.com/photo-1684284994249-935f478cc127?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                    ],
                    [
                        'title' => 'Mapa',
                        'description' => 'Todo lo que necesitas, simplemente abriendo el mapa .',
                        'image' => ('https://images.unsplash.com/photo-1633230329619-70ae2e6d50bb?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                    ],
                    [
                        'title' => 'Noticias',
                        'description' => 'Aburrido?.. No te pierdas nuestras noticias del dia.',
                        'image' => ('https://images.unsplash.com/photo-1650447973233-89e3971e1568?q=80&w=1827&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                    ],
                    [
                        'title' => 'Estadisticas',
                        'description' => 'Accede sencillamente a tu apartado de estadisticas personalizables.',
                        'image' => ('https://images.unsplash.com/photo-1625296276703-3fbc924f07b5?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                    ],
                    [
                        'title' => 'Puntos de Interes',
                        'description' => 'Explorá rutas llenas de paisajes extrabagantes y nuevas aventuras.',
                        'image' => ('https://images.unsplash.com/photo-1534787238916-9ba6764efd4f?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                    ],
                    [
                        'title' => 'Retos',
                        'description' => 'Desafiate a ti mismo a empezar y compite con las demas personas.',
                        'image' => ('https://images.unsplash.com/photo-1672768612410-cf6eb6da24b0?q=80&w=1853&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
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