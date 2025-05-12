@extends('layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-800 rounded-md shadow overflow-hidden">
        <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Editar Perfil: {{ $profile->nickname }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
                Modifica la información del perfil.
            </p>
        </div>
        <div class="p-4">
            <form action="{{ route('profiles.update', $profile) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuario</label>
                    <select id="user_id" name="user_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Selecciona un usuario</option>
                        @foreach ($users as $id => $name)
                            <option value="{{ $id }}" {{ $profile->user_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="nickname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nickname</label>
                    <input type="text" name="nickname" id="nickname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md" value="{{ old('nickname', $profile->nickname) }}">
                    @error('nickname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Género</label>
                    <input type="text" name="gender" id="gender" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md" value="{{ old('gender', $profile->gender) }}">
                    @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="profile_ph" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto de Perfil</label>
                    @if ($profile->profile_ph)
                        <img src="{{ asset('storage/' . $profile->profile_ph) }}" alt="Foto de Perfil" class="mt-2 rounded-full h-20 w-20 object-cover">
                    @endif
                    <input type="file" name="profile_ph" id="profile_ph" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md">
                    @error('profile_ph') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md">{{ old('description', $profile->description) }}</textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="cyclist_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Ciclista</label>
                    <input type="text" name="cyclist_type" id="cyclist_type" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md" value="{{ old('cyclist_type', $profile->cyclist_type) }}">
                    @error('cyclist_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="busy_routes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rutas Concurridas (Número)</label>
                    <input type="number" name="busy_routes" id="busy_routes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md" value="{{ old('busy_routes', $profile->busy_routes) }}">
                    @error('busy_routes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="achievements" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Logros</label>
                    <textarea name="achievements" id="achievements" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md">{{ old('achievements', $profile->achievements) }}</textarea>
                    @error('achievements') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="interest_place_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lugar de Interés Principal</label>
                    <select id="interest_place_id" name="interest_place_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Selecciona un lugar de interés (opcional)</option>
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}" {{ $profile->interest_place_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('interest_place_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="configurations_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Configuración</label>
                    <select id="configurations_id" name="configuration_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Selecciona una configuración (opcional)</option>
                        @foreach ($configurations as $id => $name)
                            <option value="{{ $id }}" {{ $profile->configuration_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('configuration_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="interest_places" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lugares de Interés Adicionales</label>
                    <select multiple name="interest_places[]" id="interest_places" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}" {{ in_array($id, $profile->interestPlaces()->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    <span class="text-gray-500 dark:text-gray-300 text-xs">Puedes seleccionar varios lugares de interés.</span>
                    @error('interest_places') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('profiles.index') }}" class="bg
                    -gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancelar
                    </a>
                    <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-indigo-500 dark:bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Actualizar Perfil
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection