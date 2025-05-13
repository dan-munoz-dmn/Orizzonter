@extends('layouts.app')

@section('content')
<div id="background" class="fixed inset-0 bg-cover bg-center flex items-center justify-center opacity-0 transition-opacity duration-700"
     style="background-image: url('https://images.unsplash.com/photo-1534146789009-76ed5060ec70?q=80&w=1909&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
     <div id="login-form" class="animate__animated animate__fadeInDown bg-white/50 bg-opacity-90 backdrop-blur-md shadow-2xl rounded-xl p-8 w-full max-w-md">

        <div class="text-center text-blue-700 font-bold text-2xl mb-6">
            {{ __('Iniciar Sesión') }}
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-blue-900 mb-1">{{ __('Correo Electrónico') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-blue-900 mb-1">{{ __('Contraseña') }}</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') @enderror">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Recordarme --}}
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2 text-blue-600" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="text-sm text-blue-900">{{ __('Recordarme') }}</label>
            </div>

            {{-- Botones --}}
            <div class="flex items-center justify-center space-x-1  ">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700  text-white font-bold py-2 px-7 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    {{ __('Entrar') }}
                </button>
                <a href="{{ route('register') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 m-6 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    {{ __('Registrar') }}
                </a>
            </div>

            {{-- Iniciar con --}}
            <div class="w-full text-center mt-6">
                <label class="block text-sm text-blue-900 mb-2">{{ __('Iniciar sesión con') }}</label>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-blue-600 text-2xl hover:scale-125 transition-transform duration-300">
                        <i class="bi bi-google"></i>
                    </a>
                    <a href="#" class="text-gray-800 text-2xl hover:scale-125 transition-transform duration-300">
                        <i class="bi bi-github"></i>
                    </a>
                </div>
            </div>

            {{-- Recuperar contraseña alineado a la izquierda --}}
            <div class="mt-6 text-left">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const bg = document.getElementById("background");

        // Mostrar fondo con transición
        bg.classList.remove("opacity-0");
        bg.classList.add("opacity-100");

        // Prevenir navegación hacia atrás
        if (window.history && window.history.pushState) {
            window.history.pushState(null, '', window.location.href);
            window.addEventListener('popstate', function () {
                window.location.href = "{{ route('login') }}";
            });
        }
    });
</script>
@endpush
