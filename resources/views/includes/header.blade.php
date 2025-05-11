{{-- resources/views/components/navbar.blade.php --}}
<nav id="mainNavbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent">
    <div class="flex justify-between items-center sm:px-12 sm:py-4 px-4 py-3">
        {{-- Logo --}}
        <div class="flex items-center gap-2 font-bold pl-12">
            <i class="bi bi-bicycle text-5xl"></i>
        </div>

        {{-- Links desktop --}}
        <div class="hidden md:flex md:items-center">
            <ul class="flex space-x-8 px-12">
                <li><a href="#" class="navbarLinks">Inicio</a></li>
                <li><a href="#" class="navbarLinks">Acerca de</a></li>
                <li><a href="#" class="navbarLinks">Servicios</a></li>
                <li><a href="#" class="navbarLinks">Contacto</a></li>
            </ul>

            <a href="/login" class="loginBtn">
                Iniciar sesión
            </a>
        </div>

        {{-- Botón hamburguesa (para móvil) --}}
        <button id="mobileMenuButton" type="button" aria-label="Abrir/cerrar menú" class="md:hidden text-black p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Menú móvil (inicialmente oculto) --}}
    <div id="mobileMenu" class="movilMenu">
        <ul class="flex flex-col py-2">
            <li><a href="#" class="navbarLinks">Inicio</a></li>
            <li><a href="#" class="navbarLinks">Acerca de</a></li>
            <li><a href="#" class="navbarLinks">Servicios</a></li>
            <li><a href="#" class="navbarLinks">Contacto</a></li>
        </ul>
    </div>
</nav>