<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar-label {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased">

    <button id="toggleSidebar"
        class="fixed top-4 left-4 z-50 p-3 bg-white rounded-md shadow-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
        aria-label="Abrir/cerrar menú">
        <svg id="iconOpen" class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        <svg id="iconClose" class="w-7 h-7 text-gray-800 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>

    <aside id="sidebar"
        class="text-black fixed top-0 left-0 z-40 h-screen bg-white border-r border-gray-200 transition-all duration-300 w-64 md:translate-x-0 shadow-xl"
    >
        <div class="flex flex-col h-full justify-between">
            <div class="py-6 px-4">
                <div class="flex items-center justify-center">
                    <span class="text-2xl font-semibold text-blue-600 transition-all duration-300 sidebar-label">ORIZZONTER</span>
                </div>
                <ul class="mt-12 space-y-6 text-gray-700 text-lg font-medium">
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center gap-4 p-2 rounded-md hover:bg-gray-100 transition-colors duration-200 homeLinks">
                            <i class="material-icons text-blue-500">dashboard</i>
                            <span class="sidebar-label">Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profiles.index') }}" class="flex items-center gap-4 p-2 rounded-md hover:bg-gray-100 transition-colors duration-200 homeLinks">
                            <i class="material-icons text-green-500">people</i>
                            <span class="sidebar-label">Perfiles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('statistics.index') }}" class="flex items-center gap-4 p-2 rounded-md hover:bg-gray-100 transition-colors duration-200 homeLinks">
                            <i class="material-icons text-purple-500">inbox</i>
                            <span class="sidebar-label">Estadísticas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center gap-4 p-2 rounded-md hover:bg-gray-100 transition-colors duration-200 homeLinks">
                            <i class="material-icons text-yellow-500">people</i>
                            <span class="sidebar-label">Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('interestplaces.index') }}" class="flex items-center gap-4 p-2 rounded-md hover:bg-gray-100 transition-colors duration-200 homeLinks">
                            <i class="material-icons text-red-500">map</i>
                            <span class="sidebar-label">Lugares</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="relative p-4 border-t border-gray-200">
                <button id="userMenuBtn" class="w-full flex items-center justify-between p-2 rounded-md hover:bg-gray-100 transition-colors duration-200 focus:outline-none">
                    <div class="flex items-center gap-3">
                         <span class="font-semibold text-blue-500 w-9 h-9 rounded-full flex items-center justify-center border-2 border-blue-500">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                         </span>
                        <div class="flex-col text-left sidebar-label">
                            <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Opciones</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div id="userDropdown" class="hidden absolute bottom-16 left-3 w-[calc(100%-1.5rem)] bg-white rounded-md shadow-lg z-50 border border-gray-200">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">Perfil</a>
                    <a href="{{ route('configurations') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">Configuración</a>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 transition-colors duration-200 focus:outline-none">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <div id="main-content" class="md:ml-64 transition-all duration-300">
        <div class="p-6 bg-gray-50 shadow-md rounded-md">
            <h1 class="text-xl font-semibold text-gray-800">@yield('title')</h1>
            @yield('search_content')
        </div>
        <div class="md:h-[775px] mx-5 mt-5 rounded-t-lg">
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

        let isExpanded = window.innerWidth >= 768;

        function updateSidebarState() {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                sidebar.style.width = isExpanded ? '16rem' : '4.5rem';
                sidebarLabels.forEach(label => label.classList.toggle('hidden', !isExpanded));
                mainContent.classList.toggle('md:ml-64', isExpanded);
                mainContent.classList.toggle('md:ml-18', !isExpanded); // Adjusted for collapsed width
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0', 'w-64', 'w-18'); // Removed w-16 and added w-18
                sidebar.style.width = '';
                sidebarLabels.forEach(label => label.classList.add('hidden'));
                mainContent.classList.remove('md:ml-64', 'md:ml-18'); // Removed md:ml-16 and added md:ml-18
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
            if (window.innerWidth < 768 && isExpanded && !sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                isExpanded = false;
                updateSidebarState();
            }
        });

        window.addEventListener('resize', () => {
            updateSidebarState();
        });

        updateSidebarState();
    </script>

</body>
</html>
