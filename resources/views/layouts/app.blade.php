<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Mini-Shop Lite' }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-blue-900 via-black to-pink-700 text-white">
  {{-- Preloader --}}
  <div id="preloader" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50">
    <img src="{{ asset('images/logo.png') }}" class="w-16 h-16 rounded-full animate-spin-slow">
  </div>

  {{-- Header --}}
  <header class="w-full px-6 py-4 flex justify-between items-center">
    <a href="{{ url('/') }}" class="flex items-center gap-2">
      <img src="{{ asset('images/logo.png') }}" class="w-8 h-8 rounded-full">
      <span class="font-bold text-xl">Mini<span class="text-pink-400">Shop</span></span>
    </a>

    <nav class="flex gap-6 text-sm font-medium">
      @auth
        <a href="{{ route('logout') }}" class="hover:text-pink-300">Logout</a>
      @else
        <a href="{{ route('login') }}" class="hover:text-pink-300">Login</a>
        <a href="{{ route('register') }}" class="hover:text-pink-300">Register</a>
      @endauth
    </nav>
  </header>

  {{-- Page Content --}}
  <main class="flex-1 w-full px-6 py-8">
    @yield('content')
  </main>
</body>
</html>
