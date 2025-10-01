<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mini Shop</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    .fade-out {
      animation: fadeOut 0.5s forwards;
    }
    @keyframes fadeOut {
      to { opacity: 0; visibility: hidden; }
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-900">

  <!-- Preloader (only once, globally) -->
  <div id="preloader" class="fixed inset-0 bg-white flex items-center justify-center z-50">
    <img src="{{ asset('images/logo.png') }}" 
         alt="Logo"
         class="w-24 h-24 rounded-full"
         style="animation: spin 2s linear infinite;">
  </div>

  <!-- Main App -->
  <div id="app-content" class="hidden min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-pink-600 text-white p-4 flex justify-between">
      <a href="/" class="font-bold text-xl">Mini Shop</a>
      <nav class="space-x-4">
        <a href="/products" class="hover:underline">Products</a>
        <a href="/cart" class="hover:underline">Cart</a>
        @auth
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="hover:underline">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="hover:underline">Login</a>
        @endauth
      </nav>
    </header>

    <!-- Page Content -->
    <main class="flex-1 p-6">
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 text-center py-3">
      Mini Shop © {{ date('Y') }}
    </footer>
  </div>

  <script>
    // Hide loader when page fully loads
    window.addEventListener('load', () => {
      const preloader = document.getElementById('preloader');
      preloader.classList.add('fade-out'); 
      setTimeout(() => preloader.style.display = 'none', 500);
      document.getElementById('app-content').classList.remove('hidden');
    });
  </script>
</body>
</html>
