<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mini-Shop Lite') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
           <header class="w-full px-6 py-4 flex justify-between items-center bg-gray-800">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ url('/') }}" class="sm:hidden flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">

                    <!-- Logo Text -->
                    <div class="flex flex-col space-y-0">
                        <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                        <h1 class="text-2xl font-bold text-white">SHOP</h1>
                    </div>
                </a>

                <a href="{{ url('/') }}" class="hidden sm:flex flex-col leading-none">
                    <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                    <h1 class="text-2xl font-bold text-white flex items-center">
                        SH
                        <img src="{{ asset('images/logo.png') }}" alt="O" class="w-6 h-6 mx-1">
                        P
                    </h1>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex space-x-6 text-sm font-medium">
                <a href="{{ route('login') }}" 
                class="{{ request()->routeIs('login') ? 'text-pink-400' : 'text-white hover:text-pink-300 transition' }}">
                Login
                </a>
                <a href="{{ route('register') }}" 
                class="{{ request()->routeIs('register') ? 'text-pink-400' : 'text-white hover:text-pink-300 transition' }}">
                Register
                </a>
            </nav>
        </header>


            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
             @yield('content')
            </main>
        </div>
    </body>
</html>
