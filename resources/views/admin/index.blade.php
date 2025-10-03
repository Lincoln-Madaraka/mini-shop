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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.product.index') }}"
            class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M16 21v-4H8v4h8zM3 13h18" />
                </svg>
                Manage Products
            </a>

            <a href="#"
            class="flex items-center gap-3 bg-gradient-to-r from-pink-600 to-pink-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13" />
                </svg>
                View Orders
            </a>

            <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 bg-gradient-to-r from-purple-600 to-purple-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6v-2a4 4 0 00-3-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
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
