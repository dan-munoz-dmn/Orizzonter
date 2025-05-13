@extends('layouts.appHome')

@section('content')
    <div class="bg-gradient-to-br from-white to-blue-100 rounded-xl shadow-lg p-8">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold text-blue-700">¡Crea tu Perfil de Ciclista!</h2>
            <p class="text-gray-600 mt-2">Comparte tu pasión y conecta con la comunidad.</p>
        </div>

        <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="form-group">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
                <select id="user_id" name="user_id" required
                        class="mt-1 block w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="" disabled selected>Selecciona tu usuario</option>
                    @foreach ($users as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="nickname" class="block text-sm font-medium text-gray-700">Nickname</label>
                <div class="mt-1">
                    <input type="text" name="nickname" id="nickname"
                           class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           value="{{ old('nickname') }}" required
                           placeholder="Elige un nickname único"
                    >
                </div>
                @error('nickname')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender" class="block text-sm font-medium text-gray-700">Género</label>
                <div class="mt-1">
                    <input type="text" name="gender" id="gender"
                           class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           value="{{ old('gender') }}"
                           placeholder="Ej: Masculino, Femenino, No Binario"
                    >
                </div>
                @error('gender')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="profile_ph" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
                <div class="mt-1">
                    <input type="file" name="profile_ph" id="profile_ph"
                           class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           accept="image/*"
                    >
                </div>
                @error('profile_ph')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Sube una foto que te represente. (Opcional)</p>
            </div>

            <div class="form-group">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <div class="mt-1">
                    <textarea name="description" id="description" rows="4"
                              class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                              placeholder="Cuéntanos un poco sobre ti y tu pasión por el ciclismo...">{{ old('description') }}</textarea>
                </div>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="cyclist_type" class="block text-sm font-medium text-gray-700">Tipo de Ciclista</label>
                <div class="mt-1">
                    <input type="text" name="cyclist_type" id="cyclist_type"
                           class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           value="{{ old('cyclist_type') }}" required
                           placeholder="Ej: Urbano, MTB, Ruta, BMX"
                    >
                </div>
                @error('cyclist_type')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="busy_routes" class="block text-sm font-medium text-gray-700">Rutas Concurridas (Número)</label>
                 <div class="mt-1">
                    <input type="number" name="busy_routes" id="busy_routes"
                           class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           value="{{ old('busy_routes', 0) }}" min="0"
                           placeholder="¿Cuántas rutas sueles frecuentar?"
                    >
                 </div>
                @error('busy_routes')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="achievements" class="block text-sm font-medium text-gray-700">Logros</label>
                <div class="mt-1">
                    <textarea name="achievements" id="achievements" rows="3"
                              class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                              placeholder="Comparte tus mejores logros y experiencias...">{{ old('achievements') }}</textarea>
                </div>
                @error('achievements')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="interest_place_id" class="block text-sm font-medium text-gray-700">Lugar de Interés Principal</label>
                <div class="mt-1">
                    <select id="interest_place_id" name="interest_place_id"
                            class="mt-1 block w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected>Selecciona tu lugar de interés principal (opcional)</option>
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('interest_place_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="interest_places" class="block text-sm font-medium text-gray-700">Lugares de Interés Adicionales</label>
                <div class="mt-1">
                    <select multiple name="interest_places[]" id="interest_places"
                            class="mt-1 block w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="text-gray-500 text-sm mt-1">Puedes seleccionar varios lugares de interés. (Opcional)</p>
                @error('interest_places')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('profiles.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 text-white font-semibold py-3 px-6 rounded-md shadow-md focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7m2 4h10v-3c0-1.08-.88-1.96-2-1.96H7c-1.12 0-2 .88-2 1.96v3" />
                    </svg>
                    Guardar Perfil
                </button>
            </div>
        </form>
    </div>
@endsection