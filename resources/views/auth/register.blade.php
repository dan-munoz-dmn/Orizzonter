@extends('layouts.app')

@section('content')
<div class="fixed inset-0    flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1553173385-682bfe958d31?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="w-full max-w-lg p-10 bg-white/80 backdrop-blur-sm rounded-xl shadow-xl">
        <h2 class="text-3xl font-bold text-blue-800 text-center mb-8 tracking-wide">Bienvenido <br> a <br> Orizzonter </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            
            <div>
                <label for="name" class="block text-sm font-semibold text-blue-900 mb-1">Nombre completo</label>
                <input id="name" type="text"
                    class="w-full px-4 py-2 bg-white border border-blue-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400"
                    name="name" value="{{ old('name') }}" required autofocus placeholder="Ej. Dan Muñoz">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="username" class="block text-sm font-semibold text-blue-900 mb-1">Nombre de usuario</label>
                <input id="username" type="text"
                    class="w-full px-4 py-2 bg-white border border-blue-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400"
                    name="username" value="{{ old('username') }}" required placeholder="HolaMundo123">
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="email" class="block text-sm font-semibold text-blue-900 mb-1">Correo electrónico</label>
                <input id="email" type="email"
                    class="w-full px-4 py-2 bg-white border border-blue-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400"
                    name="email" value="{{ old('email') }}" required placeholder="correo@ejemplo.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="password" class="block text-sm font-semibold text-blue-900 mb-1">Contraseña</label>
                <input id="password" type="password"
                    class="w-full px-4 py-2 bg-white border border-blue-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400"
                    name="password" required placeholder="********">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

           
            <div>
                <label for="password-confirm" class="block text-sm font-semibold text-blue-900 mb-1">Confirmar contraseña</label>
                <input id="password-confirm" type="password"
                    class="w-full px-4 py-2 bg-white border border-blue-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400"
                    name="password_confirmation" required placeholder="********">
            </div>

         
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-900 text-white font-semibold py-2 rounded-lg transition-all duration-200 shadow-md">
                    Crear cuenta
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
