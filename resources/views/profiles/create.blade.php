@extends('layouts.appHome')

@section('content')
    <!-- Contenedor principal del formulario -->
    <div class="bg-gradient-to-br from-white to-blue-100 rounded-xl shadow-lg p-8">
        <!-- Encabezado del formulario -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold text-blue-700">¡Crea tu Perfil de Ciclista!</h2>
            <p class="text-gray-600 mt-2">Comparte tu pasión y conecta con la comunidad.</p>
        </div>

        <!-- Formulario para crear un nuevo perfil -->
        <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Selector de usuario -->
            <div class="form-group">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
                <select id="user_id" name="user_id" required class="...">
                    <option value="" disabled selected>Selecciona tu usuario</option>
                    @foreach ($users as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!--   nickname -->
            <div class="form-group">
                <label for="nickname" class="...">Nickname</label>
                <div class="mt-1">
                    <input type="text" name="nickname" id="nickname" class="..." value="{{ old('nickname') }}" required placeholder="Elige un nickname único">
                </div>
                @error('nickname')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!--   género -->
            <div class="form-group">
                <label for="gender" class="...">Género</label>
                <div class="mt-1">
                    <input type="text" name="gender" id="gender" class="..." value="{{ old('gender') }}" placeholder="Ej: Masculino, Femenino, No Binario">
                </div>
                @error('gender')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!-- subir foto de perfil -->
            <div class="form-group">
                <label for="profile_ph" class="...">Foto de Perfil</label>
                <div class="mt-1">
                    <input type="file" name="profile_ph" id="profile_ph" class="..." accept="image/*">
                </div>
                @error('profile_ph')
                    <p class="...">{{ $message }}</p>
                @enderror
                <p class="...">Sube una foto que te represente. (Opcional)</p>
            </div>

            <!--   descripcion -->
            <div class="form-group">
                <label for="description" class="...">Descripción</label>
                <div class="mt-1">
                    <textarea name="description" id="description" rows="4" class="..." placeholder="Cuéntanos un poco sobre ti y tu pasión por el ciclismo...">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!--  tipo de ciclista -->
            <div class="form-group">
                <label for="cyclist_type" class="...">Tipo de Ciclista</label>
                <div class="mt-1">
                    <input type="text" name="cyclist_type" id="cyclist_type" class="..." value="{{ old('cyclist_type') }}" required placeholder="Ej: Urbano, MTB, Ruta, BMX">
                </div>
                @error('cyclist_type')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!--  número de rutas concurridas -->
            <div class="form-group">
                <label for="busy_routes" class="...">Rutas Concurridas (Número)</label>
                <div class="mt-1">
                    <input type="number" name="busy_routes" id="busy_routes" class="..." value="{{ old('busy_routes', 0) }}" min="0" placeholder="¿Cuántas rutas sueles frecuentar?">
                </div>
                @error('busy_routes')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!--  logros -->
            <div class="form-group">
                <label for="achievements" class="...">Logros</label>
                <div class="mt-1">
                    <textarea name="achievements" id="achievements" rows="3" class="..." placeholder="Comparte tus mejores logros y experiencias...">{{ old('achievements') }}</textarea>
                </div>
                @error('achievements')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selector lugar de interés principal -->
            <div class="form-group">
                <label for="interest_place_id" class="...">Lugar de Interés Principal</label>
                <div class="mt-1">
                    <select id="interest_place_id" name="interest_place_id" class="...">
                        <option value="" disabled selected>Selecciona tu lugar de interés principal (opcional)</option>
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('interest_place_id')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selector configuración de bicicleta -->
            <div class="form-group">
                <label for="configurations_id" class="...">Configuración de Bicicleta</label>
                <div class="mt-1">
                    <select id="configurations_id" name="configuration_id" class="...">
                        <option value="" disabled selected>Selecciona la configuración de tu bici (opcional)</option>
                        @foreach ($configurations as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('configuration_id')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selector múltiple de lugares de interés adicionales -->
            <div class="form-group">
                <label for="interest_places" class="...">Lugares de Interés Adicionales</label>
                <div class="mt-1">
                    <select multiple name="interest_places[]" id="interest_places" class="...">
                        @foreach ($interestPlaces as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="...">Puedes seleccionar varios lugares de interés. (Opcional)</p>
                @error('interest_places')
                    <p class="...">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones para cancelar o guardar -->
            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('profiles.index') }}" class="...">
                    Cancelar
                </a>
                <button type="submit" class="...">
                    <!-- Icono guardar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="..." fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7m2 4h10v-3c0-1.08-.88-1.96-2-1.96H7c-1.12 0-2 .88-2 1.96v3" />
                    </svg>
                    Guardar Perfil
                </button>
            </div>
        </form>
    </div>
@endsection
