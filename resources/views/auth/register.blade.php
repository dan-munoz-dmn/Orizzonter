@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-purple-900 to-indigo-900">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-xl text-gray-800">
        <h2 class="text-3xl font-bold mb-6 text-center">{{ __('Register') }}</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NAME FIELD -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <input id="name" type="text" 
                    class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-purple-600 focus:border-purple-600 p-2 @error('name') @enderror" 
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- USERNAME FIELD -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">{{ __('Username') }}</label>
                <input id="username" type="text" 
                    class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-purple-600 focus:border-purple-600 p-2 @error('username') @enderror" 
                    name="username" value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- EMAIL ADRESS FIELD -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" 
                    class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-purple-600 focus:border-purple-600 p-2 @error('email') @enderror" 
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD FIELD -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" 
                    class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-purple-600 focus:border-purple-600 p-2 @error('password') @enderror" 
                    name="password" required autocomplete="new-password">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" 
                    class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-purple-600 focus:border-purple-600 p-2" 
                    name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-purple-700 hover:bg-purple-800 text-white font-semibold py-2 px-6 rounded-md transition-all duration-200">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
