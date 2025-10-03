{{-- resources/views/admin/index.blade.php --}}
<x-app-layout>
    {{-- Remove default white Jetstream header bar by overriding --}}
    <x-slot name="header"></x-slot>

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-black to-gray-700 text-white flex">
        
       <!-- Sidebar (desktop only) -->
        <aside class="hidden md:flex flex-col w-64 bg-black/40 backdrop-blur-lg p-6 space-y-4">
            <h2 class="text-lg font-bold mb-6">Quick Links</h2>
            <a href="{{ route('admin.index') }}"
               class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <i class="fas fa-box"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.product.index') }}"
               class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <i class="fas fa-box"></i>
                Manage Products
            </a>
            <a href="#"
               class="flex items-center gap-3 bg-gradient-to-r from-pink-600 to-pink-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <i class="fas fa-shopping-cart"></i>
                View Orders
            </a>
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 bg-gradient-to-r from-purple-600 to-purple-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <i class="fas fa-users"></i>
                View Users
            </a>
        </aside> 

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">

                <!-- Page Title -->
                <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow hover:scale-105 transition">
                        <h2 class="text-xl font-semibold">Total Users</h2>
                        <p class="text-3xl mt-4">{{ $usersCount ?? 0 }}</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow hover:scale-105 transition">
                        <h2 class="text-xl font-semibold">Total Products</h2>
                        <p class="text-3xl mt-4">{{ $productCount ?? 0 }}</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow hover:scale-105 transition">
                        <h2 class="text-xl font-semibold">Total Orders</h2>
                        <p class="text-3xl mt-4">{{ $ordersCount ?? 0 }}</p>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Preloader Script -->
    <script>
        window.addEventListener('load', () => {
            document.getElementById('preloader').style.display = 'none';
        });
    </script>
</x-app-layout>
