@extends('layouts.appHome')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <!-- Título principal -->
    <h2 class="text-4xl font-bold text-white mb-6">Configuraciones</h2>
    <p class="text-gray-400 mb-10 text-lg">Administra tus preferencias personales y la seguridad de tu cuenta.</p>

    <!-- Contenedor de las tarjetas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
  



        <!-- Notificaciones -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 transition-all duration-300 hover:scale-105 transform">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-semibold text-white">Notificaciones</h3>
                <!-- Switch de ejemplo -->
                <label class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-600 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                </label>
            </div>
            <p class="text-gray-400">Activa las notificaciones importantes por correo.</p>
        </div>

        <!-- Seguridad -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 transition-all duration-300 hover:scale-105 transform">
            <h3 class="text-2xl font-semibold text-white mb-2">Seguridad</h3>
            <p class="text-gray-400 mb-4">Cambia tu contraseña o configura autenticación de dos factores.</p>
            <a href="{{ route('configurations.security') }}" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition duration-300 ease-in-out transform hover:scale-105">Ver opciones</a>
        </div>

        <!-- Privacidad -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 transition-all duration-300 hover:scale-105 transform">
            <h3 class="text-2xl font-semibold text-white mb-2">Privacidad</h3>
            <p class="text-gray-400 mb-4">Controla cómo otros usuarios ven tu información.</p>
            <a href="{{ route('configurations.privacy') }}" class="bg-gradient-to-r from-yellow-600 to-red-600 text-white px-6 py-3 rounded-full hover:bg-yellow-700 transition duration-300 ease-in-out transform hover:scale-105">Ajustar privacidad</a>
        </div>

        <!-- Perfil -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 transition-all duration-300 hover:scale-105 transform">
            <h3 class="text-2xl font-semibold text-white mb-2">Mi perfil</h3>
            <p class="text-gray-400 mb-4">Revisa y actualiza tu información personal.</p>
            <a href="#" class="bg-gradient-to-r from-teal-600 to-blue-600 text-white px-6 py-3 rounded-full hover:bg-teal-700 transition duration-300 ease-in-out transform hover:scale-105">Ver perfil</a>
        </div>
    </div>

    <!-- Términos y Condiciones -->
    <div class="mt-12 text-center">
        <p class="text-gray-400 text-sm">
            Al continuar, aceptas nuestros <a href="#" class="text-blue-600 hover:underline">Términos y Condiciones</a>.
        </p>
    </div>
</div>
@endsection