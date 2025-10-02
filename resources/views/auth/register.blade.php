@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-black to-pink-700">
    <div class="w-full max-w-md bg-black/50 backdrop-blur-md rounded-2xl p-8 shadow-xl">
        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 rounded-full animate-spin-slow">
        </div>

        <h2 class="text-2xl font-bold text-white text-center mb-4">Create Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="text-gray-200"/>
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400"/>
                <x-input-error :messages="$errors->get('name')" class="text-pink-400 mt-1"/>
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-gray-200"/>
                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400"/>
                <x-input-error :messages="$errors->get('email')" class="text-pink-400 mt-1"/>
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-200"/>
                <x-text-input id="password" type="password" name="password" required
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400"/>
                <x-input-error :messages="$errors->get('password')" class="text-pink-400 mt-1"/>
            </div>

            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-200"/>
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-pink-400 mt-1"/>
            </div>

            <x-primary-button class="w-full bg-pink-400 text-black px-4 py-2 rounded-lg hover:bg-pink-500">
                Register
            </x-primary-button>
        </form>

        <p class="mt-6 text-center text-gray-300 text-sm">
            Already registered? 
            <a href="{{ route('login') }}" class="text-pink-400 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
