@extends('layouts.appHome')

@section('content')
<<<<<<< HEAD
    <div class="container mx-auto mt-8 p-6 bg-white rounded-lg shadow-md border border-gray-200">
        <h1 class="text-3xl font-semibold text-gray-900 mb-6">Editar Perfil: <span class="text-blue-600">{{ $profile->nickname }}</span></h1>
        <p class="text-gray-600 mb-8">Modifica la información de tu perfil.</p>

        <form action="{{ route('profiles.update', $profile) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="rounded-md shadow-sm">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
                <select id="user_id" name="user_id" class="mt-1 block w-full py-2.5 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent sm:text-sm">
                    <option value="">Selecciona un usuario</option>
                    @foreach ($users as $id => $name)
                        <option value="{{ $id }}" {{ $profile->user_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="rounded-md shadow-sm">
                <label for="nickname" class="block text-sm font-medium text-gray-700">Nickname</label>
                <input type="text" name="nickname" id="nickname" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-3 shadow-sm sm:text-sm border border-gray-300 rounded-md" value="{{ old('nickname', $profile->nickname) }}">
                @error('nickname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="rounded-md shadow-sm">
                <label for="gender" class="block text-sm font-medium text-gray-700">Género</label>
                <input type="text" name="gender" id="gender" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-3 shadow-sm sm:text-sm border border-gray-300 rounded-md" value="{{ old('gender', $profile->gender) }}">
                @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="profile_ph" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
                @if ($profile->profile_ph)
                    <div class="mt-2 rounded-full overflow-hidden w-20 h-20 border-2 border-gray-200 shadow-md">
                        <img src="{{ asset('storage/' . $profile->profile_ph) }}" alt="Foto de Perfil" class="w-full h-full object-cover">
                    </div>
                @endif
                <input type="file" name="profile_ph" id="profile_ph" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-3 shadow-sm sm:text-sm border border-gray-300 rounded-md">
                @error('profile_ph') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="rounded-md shadow-sm">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" rows="4" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-3 shadow-sm sm:text-sm border border-gray-300 rounded-md"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="rounded-md shadow-sm">
                <label for="cyclist_type" class="block text-sm font-medium text-gray-700">Tipo de Ciclista</label>
                <input type="text" name="cyclist_type" id="cyclist_type" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-3 shadow-sm sm:text-sm border border-gray-300 rounded-md" value="{{ old('cyclist_type', $profile->cyclist_type) }}">
                @error('cyclist_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="rounded-md shadow-sm">
                <label for="busy_routes" class="block text-sm font-medium text-gray-700">Rutas Concurridas (Número)</label>
                <input type="number" name="busy_routes" id="busy_routes" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-3 shadow-sm sm:text-sm border border-gray-300 rounded-md" value="{{ old('busy_routes', $profile->busy_routes) }}">
                @error('busy_routes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="rounded-md shadow-sm">
                <label for="achievements" class="block text-sm font-medium text-gray-700">Logros</label>
                <textarea name="achievements" id="achievements" rows="4" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-3 shadow-sm sm:text-sm border border-gray-300 rounded-md">{{ old('achievements', $profile->achievements) }}</textarea>
                @error('achievements') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="rounded-md shadow-sm">
                <label for="interest_place_id" class="block text-sm font-medium text-gray-700">Lugar de Interés Principal</label>
                <select id="interest_place_id" name="interest_place_id" class="mt-1 block w-full py-2.5 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-blue-500 focus:border-transparent sm:text-sm">
                    <option value="">Selecciona un lugar de interés (opcional)</option>
                    @foreach ($interestPlaces as $id => $name)
                        <option value="{{ $id }}" {{ $profile->interest_place_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('interest_place_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>



            <div class="flex justify-end mt-6">
                <a href="{{ route('profiles.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2.5 px-5 rounded-lg focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                    Cancelar
                </a>
                <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2.5 px-5 rounded-lg focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                    Actualizar Perfil
                </button>
            </div>
        </form>
=======
    <!-- Contenedor principal del formulario de edición de perfil -->
    <div class="bg-white dark:bg-gray-800 rounded-md shadow overflow-hidden">
        
        <!-- Encabezado del formulario -->
        <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Editar Perfil: {{ $profile->nickname }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
                Modifica la información del perfil.
            </p>
        </div>

        <!-- Cuerpo del formulario -->
        <div class="p-4">
            <!-- Formulario para actualizar el perfil -->
            <form action="{{ route('profiles.update', $profile) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Seleccion del usuario -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuario</label>
                    <select id="user_id" name="user_id" class="...">
                        <option value="">Selecciona un usuario</option>
                        @foreach ($users as $id => $name)
                            <option value="{{ $id }}" {{ $profile->user_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Campo para nickname del perfil -->
                <div>
                    <label for="nickname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nickname</label>
                    <input type="text" name="nickname" id="nickname" class="..." value="{{ old('nickname', $profile->nickname) }}">
                    @error('nickname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Campo para genero -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Género</label>
                    <input type="text" name="gender" id="gender" class="..." value="{{ old('gender', $profile->gender) }}">
                    @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!--   imagen de perfil -->
                <div>
                    <label for="profile_ph" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto de Perfil</label>
                    @if ($profile->profile_ph)
                        <!-- Imagen actual del perfil -->
                        <img src="{{ asset('storage/' . $profile->profile_ph) }}" alt="Foto de Perfil" class="...">
                    @endif
                    <input type="file" name="profile_ph" id="profile_ph" class="...">
                    @error('profile_ph') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!--   descripcion del perfil -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                    <textarea name="description" id="description" rows="3" class="...">{{ old('description', $profile->description) }}</textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!--  tipo de ciclista -->
                <div>
                    <label for="cyclist_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Ciclista</label>
                    <input type="text" name="cyclist_type" id="cyclist_type" class="..." value="{{ old('cyclist_type', $profile->cyclist_type) }}">
                    @error('cyclist_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!--   numero de rutas concurridas -->
                <div>
                    <label for="busy_routes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rutas Concurridas (Número)</label>
                    <input type="number" name="busy_routes" id="busy_routes" class="..." value="{{ old('busy_routes', $profile->busy_routes) }}">
                    @error('busy_routes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <!-- Campo para logros -->
                <div>
                    <label for="achievements" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Logros</label>
                    <textarea name="achievements" id="achievements" rows="3" class="...">{{ old('achievements', $profile->achievements) }}</textarea>
                    @error('achievements') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Lugar de interes principal -->
                <div>
                    <label for="interest_place_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lugar de Interés Principal</label>
                    <select id="interest_place_id" name="interest_place_id" class="...">
                        <option value="">Selecciona un lugar de interés (opcional)</option>
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}" {{ $profile->interest_place_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('interest_place_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Seleccion de configuracion -->
                <div>
                    <label for="configurations_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Configuración</label>
                    <select id="configurations_id" name="configuration_id" class="...">
                        <option value="">Selecciona una configuración (opcional)</option>
                        @foreach ($configurations as $id => $name)
                            <option value="{{ $id }}" {{ $profile->configuration_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('configuration_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Seleccion multiple de lugares de interes adicionales -->
                <div>
                    <label for="interest_places" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lugares de Interés Adicionales</label>
                    <select multiple name="interest_places[]" id="interest_places" class="...">
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}" {{ in_array($id, $profile->interestPlaces()->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    <span class="text-gray-500 dark:text-gray-300 text-xs">Puedes seleccionar varios lugares de interés.</span>
                    @error('interest_places') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Botones para cancelar o actualizar perfil -->
                <div class="flex items-center justify-end">
                    <a href="{{ route('profiles.index') }}" class="...">
                        Cancelar
                    </a>
                    <button type="submit" class="ml-4 ...">
                        Actualizar Perfil
                    </button>
                </div>

            </form>
        </div>
>>>>>>> c5b0dea914656cabcb29711e7159a5b4e079e68f
    </div>
@endsection
