<x-app-layout>
    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-black to-gray-700 text-white flex flex-col">

        <!-- Top Navbar -->
        <nav class="w-full bg-black/40 backdrop-blur-lg shadow p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide">Mini Shop Lite</h1>
            <div class="flex gap-6">
                <!-- Dashboard / Catalog -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:text-pink-400 transition">
                    <!-- Home Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                    </svg>
                    Dashboard
                </a>

                <!-- Cart -->
                <a href="#" class="flex items-center gap-2 hover:text-pink-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13M7 13l10 0" />
                    </svg>
                    Cart
                </a>

                <!-- Checkout -->
                <a href="#" class="flex items-center gap-2 hover:text-pink-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 1.343-3 3v1h6v-1c0-1.657-1.343-3-3-3zm9 4h-1a9 9 0 11-16 0H3" />
                    </svg>
                    Checkout
                </a>

                <!-- My Orders -->
                <a href="#" class="flex items-center gap-2 hover:text-pink-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 17v-2h6v2a2 2 0 002 2h2v2H5v-2h2a2 2 0 002-2zm0-6V9a3 3 0 016 0v2" />
                    </svg>
                    My Orders
                </a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Page Title -->
                <h2 class="text-3xl font-bold mb-8">Product Catalog</h2>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow hover:scale-105 transition flex flex-col">
                            <!-- Product Image -->
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-xl mb-4 h-40 w-full object-cover">
                            @else
                                <div class="bg-gray-800 h-40 w-full rounded-xl mb-4 flex items-center justify-center text-gray-400">
                                    No Image
                                </div>
                            @endif

                            <!-- Product Info -->
                            <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-300 text-sm mb-4 line-clamp-3">{{ $product->description }}</p>

                            <div class="mt-auto">
                                <p class="text-lg font-bold mb-2">Ksh {{ number_format($product->price, 2) }}</p>
                                <p class="text-sm text-gray-400 mb-4">Stock: {{ $product->stock }}</p>

                                <!-- Actions -->
                                <div class="flex gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" 
                                       class="flex-1 text-center bg-gradient-to-r from-blue-600 to-blue-400 text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                                        View Details
                                    </a>
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                        @csrf
                                        <button type="submit" 
                                                class="flex-1 text-center bg-gradient-to-r from-pink-600 to-pink-400 text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
