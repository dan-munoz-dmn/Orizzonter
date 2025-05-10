<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-purple-950 text-white">

    <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    
    </button>

    <aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                
                <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                
                <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                
                <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <i class="bi bi-person"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                
                <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                
                <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                
                <span class="ms-3">Upgrade to Pro</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                <i class="bi bi-file"></i>
                <span class="ms-3">Documentation</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                
                <span class="ms-3">Components</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                <span class="ms-3">Help</span>
                </a>
            </li>
            <!-- CLOSE SESSION -->
            <li class="fixed bottom-0 w-full mb-4">
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit"
                            class="border rounded-lg bg-gray-800 w-56 py-3">
                        <span class="truncate">Cerrar sesión</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
    </aside>

    <!-- VARIABLE CONTENT -->
    <div class="p-4 sm:ml-64">
        <x-search
            action="{{ route('users.index') }}"
            placeholder="Buscar usuario por nombre o email..."
            name="search"
        />
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="flex items-center justify-center h-48 mb-4 rounded-sm md:h-[680px] bg-gray-50 dark:bg-gray-800">
                @yield('content')
            </div>
        </div>
    </div>

<script>
    document.querySelector('[data-drawer-toggle="separator-sidebar"]').addEventListener('click', () => {
        const sidebar = document.getElementById('separator-sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>

</body>
</html>