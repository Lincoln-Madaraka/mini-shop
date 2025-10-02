
@extends('layouts.app') {{-- Or use your main layout if you have one --}}

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-black to-pink-700">
    <div class="w-full max-w-md bg-black/50 backdrop-blur-md rounded-2xl p-8 shadow-xl">
        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 rounded-full animate-spin-slow">
        </div>

        <h2 class="text-2xl font-bold text-white text-center mb-4">Welcome Back!</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-gray-200"/>
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400" />
                <x-input-error :messages="$errors->get('email')" class="text-pink-400 mt-1"/>
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-200"/>
                <x-text-input id="password" type="password" name="password" required
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400" />
                <x-input-error :messages="$errors->get('password')" class="text-pink-400 mt-1"/>
            </div>

            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember" class="rounded text-pink-400 focus:ring-pink-400">
                <label for="remember_me" class="ml-2 text-gray-300 text-sm">Remember me</label>
            </div>

            <div class="flex justify-between items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-pink-400 hover:underline">
                        Forgot your password?
                    </a>
                @endif

                <x-primary-button class="bg-pink-400 text-black px-4 py-2 rounded-lg hover:bg-pink-500">
                    Log in
                </x-primary-button>
            </div>
        </form>

        <p class="mt-6 text-center text-gray-300 text-sm">
            Don’t have an account? 
            <a href="{{ route('register') }}" class="text-pink-400 hover:underline">Register</a>
        </p>
    </div>
</div>
@endsection
