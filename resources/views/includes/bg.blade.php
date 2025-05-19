<div id="main-content" class="md:ml-64 transition-all duration-300">
    <div class="p-6 bg-gray-50 shadow-md rounded-md">
        <h1 class="text-xl font-semibold text-gray-800">@yield('title')</h1>
        @yield('search_content')
    </div>

    @hasSection('background_image')
        <div class="md:h-[775px] mx-5 mt-5 rounded-t-lg">
            <div class="bg-[url('@yield('background_image')]') bg-center bg-cover">
                s
            </div>
        </div>
    @endif

    @yield('content')
</div>
