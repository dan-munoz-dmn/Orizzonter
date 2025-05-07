<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div id="app">
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a href="{{ url('/') }}" class="flex items-center text-lg font-semibold text-orange-600 hover:text-orange-800">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="flex items-center">
                        @guest
                            <div class="space-x-4">
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-orange-600">
                                        {{ __('Login') }}
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm font-medium text-gray-700 hover:text-orange-600">
                                        {{ __('Register') }}
                                    </a>
                                @endif
                            </div>
                        @else
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-700 hover:text-orange-600 focus:outline-none">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-orange-100">
                                            {{ __('Logout') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
