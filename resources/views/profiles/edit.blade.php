@extends('layouts.appHome')

@section('content')
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
    </div>
@endsection
