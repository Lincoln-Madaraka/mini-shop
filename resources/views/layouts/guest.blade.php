<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Mini-Shop Lite' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-blue-900 via-black to-pink-700 text-white">
    <div class="relative min-h-screen flex flex-col">
        <!-- Header -->
        <header class="w-full px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ url('/') }}" class="sm:hidden flex items-center space-x-2">
                    <img src="{{ asset('import/assets/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                    <div class="flex flex-col space-y-0">
                        <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                        <h1 class="text-2xl font-bold text-white">SHOP<sup class="text-[0.45rem] ml-1 align-super">LITE</sup></h1>
                    </div>
                </a>
                <a href="{{ url('/') }}" class="hidden sm:flex flex-col leading-none">
                    <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                    <h1 class="text-2xl font-bold text-white flex items-center">
                        SH
                        <img src="{{ asset('import/assets/logo.png') }}" alt="O" class="w-6 h-6 mx-1">
                        P<sup class="text-[0.45rem] ml-1 align-super">LITE</sup>
                    </h1>
                </a>
            </div>

            <nav class="flex space-x-6 text-sm font-medium">
                <a href="{{ route('login') }}" 
                   class="{{ request()->routeIs('login') ? 'text-pink-400' : 'text-white' }} hover:text-pink-300 transition">
                   Login
                </a>
                <a href="{{ route('register') }}" 
                   class="{{ request()->routeIs('register') ? 'text-pink-400' : 'text-white' }} hover:text-pink-300 transition">
                   Register
                </a>
            </nav>
        </header>

        <main class="flex-1 flex flex-col justify-center items-center px-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
