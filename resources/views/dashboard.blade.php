<x-app-layout>
    <div class="min-h-screen bg-cream text-black flex flex-col" x-data="{ open: false, selectedProduct: null }">

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">

                <!-- Header + Filter Bar -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                    <h2 class="text-3xl font-bold text-black">Product Catalog</h2>

                    <!-- Filter Button -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-6 6V21l-4-2v-8.293l-6-6A1 1 0 013 6V4z"/>
                            </svg>
                            Filter
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded-lg shadow-lg p-3 hidden group-hover:block z-50">
                            <form method="GET" action="{{ route('dashboard') }}">
                                <select name="filter" class="w-full bg-gray-700 rounded-lg p-2 text-white">
                                    <option value="">All</option>
                                    <option value="low_stock" {{ request('filter') == 'low_stock' ? 'selected' : '' }}>Low Stock (&lt;5)</option>
                                    <option value="high_price" {{ request('filter') == 'high_price' ? 'selected' : '' }}>High Price</option>
                                    <option value="low_price" {{ request('filter') == 'low_price' ? 'selected' : '' }}>Low Price</option>
                                </select>
                                <button type="submit" class="mt-2 w-full bg-pink-600 hover:bg-pink-500 rounded-lg py-2 font-bold">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>

                @php
                    $availableProducts = $products->filter(fn($p) => $p->stock > 0);
                @endphp

                @if($availableProducts->isEmpty())
                    <div class="text-center py-12 text-white">
                        <p class="text-xl font-semibold mb-2">No products available yet!</p>
                        <p class="text-gray-300">Check back later for new items.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($availableProducts as $product)
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

                                    <div class="flex gap-2">
                                        <button @click="open = true; selectedProduct = {{ $product->id }}"
                                            class="flex-1 text-center font-bold bg-blue-900 text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                                            View Details
                                        </button>
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
                @endif

            </div>
        </main>

        <!-- Cart Notification Modal -->
        <div x-data="{ show: {{ session('success') ? 'true' : 'false' }} }" 
            x-show="show" 
            x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-md p-4">

            <div class="bg-black text-white rounded-2xl p-6 max-w-sm w-full relative flex flex-col items-center gap-4">
                <button @click="show = false" 
                        class="absolute top-2 right-2 text-white text-3xl font-bold hover:bg-black/20 rounded-full px-2">
                    &times;
                </button>
                <p class="text-lg font-semibold text-center">
                    {{ session('success') }}
                    <span class="block mt-1">You can continue shopping!</span>
                </p>
            </div>
        </div>

        <!-- Full Page Modal -->
        <div x-show="open" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-md p-4">
            <div class="bg-black/90 backdrop-blur-lg p-6 rounded-2xl max-w-md w-full relative flex flex-col">
                <button @click="open = false" class="absolute top-2 right-2 text-white text-4xl font-bold px-4 py-2 rounded-full hover:bg-white/20 transition bg-gray-800/50">
                    &times;
                </button>

                <template x-for="product in {{ $products }}" :key="product.id">
                    <div x-show="selectedProduct === product.id" class="flex flex-col">
                        <img :src="'/storage/' + product.image" alt="" class="rounded-xl mb-4 w-full h-64 object-cover" x-show="product.image">
                        <div class="bg-gray-800 h-64 w-full rounded-xl mb-4 flex items-center justify-center text-gray-400" x-show="!product.image">
                            No Image
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-2" x-text="product.name"></h3>
                        <p class="text-gray-300 mb-4" x-text="product.description"></p>
                        <p class="text-lg text-yellow-500 font-bold mb-2" x-text="'Ksh ' + product.price.toLocaleString()"></p>
                        <p class="text-sm text-gray-400 mb-4" x-text="'Stock: ' + product.stock"></p>

                        <form method="POST" :action="'/cart/' + product.id + '/add'">
                            @csrf
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-pink-600 to-pink-400 text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </template>
            </div>
        </div>

    </div>
</x-app-layout>
