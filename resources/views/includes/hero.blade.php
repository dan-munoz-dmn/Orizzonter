@vite('resources/js/navbar.js')

<section class="min-h-screen w-full">
    <div class="flex w-full min-h-screen">
        <!-- Contenedor izquierdo -->
        <div class="w-1/2 flex flex-col justify-center items-center text-left ">
            <div class="w-[700px] pl-42">
                <h1 class="text-5xl sm:text-7xl text-gray-900 drop-shadow" style="font-family: Orbitron;">
                    ORIZZONTER
                </h1>

                <p class="py-8 font-semibold text-2xl text-purple-800">
                    ¡Explora nuevos horizontes!
                </p>

                <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, aut magni tempore laudantium dolores et nobis accusamus fuga veritatis eligendi expedita sit quo error iure odio, sint voluptatum nulla aliquid.
                </p>

                <div class="flex flex-col sm:flex-row sm:space-x-6 space-y-4 sm:space-y-0">
                    <a class="py-2 px-8 sm:px-12 rounded-3xl bg-black text-white hover:bg-purple-700 transition-all duration-300 flex items-center justify-center shadow-lg cursor-pointer">
                        Jugar ahora
                        <i class="ml-2 bi bi-controller text-xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contenedor derecho -->
        <div class="w-1/2 flex justify-left  items-center pl-42">
            <img
                src="{{ asset('images/phoneImage.png') }}"
                alt="image"
                class="w-full max-w-md h-[600px] object-contain"
            />
        </div>
    </div>
</section>

