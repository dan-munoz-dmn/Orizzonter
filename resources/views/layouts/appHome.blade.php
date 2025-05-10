<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="text-white font-sans antialiased">

    <button id="toggleSidebar"
        class="fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded-md shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 transition"
        aria-label="Abrir/cerrar menú">
        <svg id="iconOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        <svg id="iconClose" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>

    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 h-screen bg-gray-100 dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-all duration-300 w-64 md:translate-x-0"
    >
        <div class="flex flex-col h-full justify-between">
            <div class="py-4 px-3">
                <div class="flex items-center justify-center py-2">
                    <span class="text-2xl font-semibold text-gray-800 dark:text-white transition-all duration-300 sidebar-label">ORIZZONTER</span>
                </div>
                <ul class="mt-10 text-gray-700 space-y-4 dark:text-gray-300 font-medium">
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                            <i class="material-icons mr-3">dashboard</i>
                            <span class="sidebar-label">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                            <i class="material-icons mr-3">inbox</i>
                            <span class="sidebar-label">Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                            <i class="material-icons mr-3">people</i>
                            <span class="sidebar-label">Usuarios</span>
                        </a>
                    </li>
                                        <li>
                        <a href="{{ route('users.index') }}" class="flex items-center p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                            <i class="material-icons mr-3">people</i>
                            <span class="sidebar-label">Usuarios</span>
                        </a>
                    </li>
                                        <li>
                        <a href="{{ route('users.index') }}" class="flex items-center p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                            <i class="material-icons mr-3">people</i>
                            <span class="sidebar-label">Usuarios</span>
                        </a>
                    </li>
                    </ul>
            </div>

            <div class="relative p-3 border-t border-gray-200 dark:border-gray-700">
                <button id="userMenuBtn" class="w-full flex items-center justify-between p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition focus:outline-none">
                    <div class="flex items-center gap-3">
                        <!-- <img src="https://i.pravatar.cc/40" class="rounded-full w-8 h-8" alt="avatar" /> -->
                          <span class="text-sm font-semibold bg-amber-500 w-8 h-8 rounded-2xl">U</span>
                        <div class="flex-col text-left sidebar-label">
                            <p class="text-sm font-semibold text-gray-800 dark:text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Opciones</p>
                        </div>
                    </div>
                    <i class="material-icons text-gray-500 dark:text-gray-400">expand_more</i>
                </button>
                <div id="userDropdown" class="hidden absolute bottom-16 left-3 w-[calc(100%-1.5rem)] bg-white dark:bg-gray-800 rounded-md shadow-md z-50 border border-gray-200 dark:border-gray-700">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">Perfil</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">Configuración</a>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900 transition focus:outline-none">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <div id="main-content" class="md:ml-64 transition-all duration-300">
        <div class="p-6 bg-gray-100 dark:bg-gray-800 shadow-md">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-white">Contenido Principal</h1>
        </div>
        <div class="md:h-[775px] mx-5 mt-5 rounded-t-lg dark:bg-gray-800">
                @yield('content')
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const iconOpen = document.getElementById('iconOpen');
        const iconClose = document.getElementById('iconClose');
        const sidebarLabels = document.querySelectorAll('.sidebar-label');
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');
        const mainContent = document.getElementById('main-content');

        let isExpanded = window.innerWidth >= 768; // Inicialmente expandido en pantallas grandes

        // Función para actualizar el estado del sidebar y el contenido
        function updateSidebarState() {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                sidebar.style.width = isExpanded ? '16rem' : '4.5rem';
                sidebarLabels.forEach(label => label.classList.toggle('hidden', !isExpanded));
                mainContent.classList.toggle('md:ml-64', isExpanded);
                mainContent.classList.toggle('md:ml-16', !isExpanded);
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0', 'w-64', 'w-16');
                sidebar.style.width = ''; // Resetear el ancho para el off-canvas
                sidebarLabels.forEach(label => label.classList.add('hidden'));
                mainContent.classList.remove('md:ml-64', 'md:ml-16');
                mainContent.classList.add('ml-0');
            }

            iconOpen.classList.toggle('hidden', isExpanded && window.innerWidth >= 768);
            iconClose.classList.toggle('hidden', !isExpanded || window.innerWidth < 768);
        }

        toggleBtn.addEventListener('click', () => {
            isExpanded = !isExpanded;
            updateSidebarState();
        });

        userMenuBtn.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
            // Cierra el sidebar si se hace clic fuera de él en pantallas pequeñas
            if (window.innerWidth < 768 && isExpanded && !sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                isExpanded = false;
                updateSidebarState();
            }
        });

        window.addEventListener('resize', () => {
            updateSidebarState();
        });

        // Inicializar el estado al cargar la página
        updateSidebarState();
    </script>

</body>
</html>