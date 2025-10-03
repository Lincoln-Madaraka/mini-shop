<x-app-layout>
    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div class="min-h-screen bg-cream text-black flex flex-col">

        <!-- Top Navbar -->
        

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Page Title -->
                <h2 class="text-3xl font-bold mb-8">Product Catalog</h2>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow hover:scale-105 transition flex flex-col bg-gradient-to-br from-blue-900 via-black to-gray-700">
                            <!-- Product Image -->
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-xl mb-4 h-40 w-full object-cover text-white">
                            @else
                                <div class="bg-gray-800 h-40 w-full rounded-xl mb-4 flex items-center justify-center text-gray-400">
                                    No Image
                                </div>
                            @endif

                            <!-- Product Info -->
                            <h3 class="text-xl text-white font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-300 text-sm mb-4 line-clamp-3">{{ $product->description }}</p>

                            <div class="mt-auto">
                                <p class="text-lg text-yellow-500 font-bold mb-2">Ksh {{ number_format($product->price, 2) }}</p>
                                <p class="text-sm text-gray-400 mb-4">Stock: {{ $product->stock }}</p>

                                <!-- Actions -->
                                <div class="flex gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" 
                                       class="flex-1 text-center font-bold bg-blue-900 text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                                        View Details
                                    </a>
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                        @csrf
                                        <button type="submit" 
                                                class="flex-1 text-center font-bold bg-pink-600 text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
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
