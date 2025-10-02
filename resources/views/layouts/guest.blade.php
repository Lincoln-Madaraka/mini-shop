<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Mini-Shop Lite' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-blue-900 via-black to-pink-700 text-white">
    <div class="min-h-screen flex flex-col justify-center items-center px-6">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-3 mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 rounded-full">
            <h1 class="text-3xl font-bold text-pink-400">MINI SHOP</h1>
        </a>

        {{-- Slot for content --}}
        {{ $slot }}
    </div>
</body>
</html>
