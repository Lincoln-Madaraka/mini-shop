<x-app-layout>
    <div class="min-h-screen bg-cream text-black flex flex-col" x-data="{ open: false, selectedProduct: null, filterOpen: false }">

        <!-- My main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                    <h2 class="text-3xl font-bold text-black">Product Catalog</h2>

                    <div class="relative">
                        <button 
                            @click="filterOpen = !filterOpen" 
                            class="flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-6 6V21l-4-2v-8.293l-6-6A1 1 0 013 6V4z"/>
                            </svg>
                            Filter
                        </button>

                        <div 
                            x-show="filterOpen" 
                            x-transition 
                            @click.outside="filterOpen = false"
                            class="absolute right-0 mt-2 w-64 bg-gray-800 text-white rounded-lg shadow-lg p-3 z-50">
                            
                            <form method="GET" action="{{ route('dashboard') }}">
                                <select name="filter" class="w-full bg-gray-700 rounded-lg p-2 text-white mb-2">
                                    <option value="">All</option>
                                    <option value="low_stock" {{ request('filter') == 'low_stock' ? 'selected' : '' }}>Low Stock (&lt;5)</option>
                                    <option value="high_price" {{ request('filter') == 'high_price' ? 'selected' : '' }}>High Price</option>
                                    <option value="low_price" {{ request('filter') == 'low_price' ? 'selected' : '' }}>Low Price</option>
                                </select>

                                <div class="flex gap-2 mb-2">
                                    <input type="number" name="min_price" placeholder="Min Ksh" 
                                        value="{{ request('min_price') }}" 
                                        class="w-1/2 bg-gray-700 rounded-lg p-2 text-white" min="0">
                                    <input type="number" name="max_price" placeholder="Max Ksh" 
                                        value="{{ request('max_price') }}" 
                                        class="w-1/2 bg-gray-700 rounded-lg p-2 text-white" min="0">
                                </div>

                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-900 rounded-lg py-2 font-bold">Apply</button>
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
                            <!-- Product Card -->
                            <div
                                class="bg-[#f5f2e9]/95 backdrop-blur-lg p-6 rounded-2xl shadow-lg border border-gray-300 
                                       hover:scale-[1.03] hover:shadow-2xl transition-transform duration-300 ease-out 
                                       flex flex-col text-gray-900">

                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="rounded-xl mb-4 h-40 w-full object-cover transition-transform duration-500 hover:scale-105">
                                @else
                                    <div class="bg-gray-200 h-40 w-full rounded-xl mb-4 flex items-center justify-center text-gray-500">
                                        No Image
                                    </div>
                                @endif

                                <!-- Product Info -->
                                <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                                <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ $product->description }}</p>

                                <div class="mt-auto">
                                    <p class="text-lg text-red-600 font-bold mb-2">Ksh {{ number_format($product->price, 2) }}</p>
                                    <p class="text-sm text-gray-500 mb-4">Stock: {{ $product->stock }}</p>

                                    <!-- FIXED BUTTONS -->
                                    <div class="flex gap-3">
                                        <!-- View Details -->
                                        <button 
                                            @click="open = true; selectedProduct = {{ $product->id }}"
                                            class="flex-1 min-w-[120px] text-center font-bold text-gray-900 border border-gray-600 
                                                   bg-white px-3 py-2 rounded-lg hover:bg-gray-100 hover:border-gray-800 
                                                   transition-colors duration-300 whitespace-nowrap">
                                            View Details
                                        </button>

                                        <!-- Add to Cart -->
                                        <form method="POST" action="{{ route('cart.add', $product->id) }}" class="flex-1 min-w-[120px]">
                                            @csrf
                                            <button type="submit"
                                                    class="w-full flex items-center justify-center gap-2 font-bold bg-blue-700 text-white 
                                                           px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300 whitespace-nowrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" 
                                                     class="w-5 h-5 animate-[vibrate_0.3s_ease-in-out_infinite_alternate]"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m10-9l2 9m-6-9v9"/>
                                                </svg>
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

            <div class="bg-white text-black rounded-2xl p-6 max-w-sm w-full relative flex flex-col items-center gap-4">
                <button @click="show = false" 
                        class="absolute top-2 right-2 text-black text-3xl font-bold hover:bg-black/20 rounded-full px-2">
                    &times;
                </button>
                <p class="text-sm text-center">
                    {{ session('success') }}
                    <span class="block mt-1">You can continue shopping!</span>
                </p>
            </div>
        </div>

        <!-- Full Page Modal -->
        <div x-show="open" x-transition.opacity 
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-md p-4">

            <div class="bg-[#f5f2e9]/95 backdrop-blur-lg text-gray-900 
                        p-6 rounded-2xl border border-gray-300 max-w-md w-full relative flex flex-col shadow-xl">

                <!-- Close Button -->
                <button @click="open = false"
                    class="absolute top-2 right-2 text-gray-700 text-4xl font-bold px-4 py-2 rounded-full 
                           bg-gray-200 hover:bg-gray-300 transition">
                    &times;
                </button>

                <!-- Product Details -->
                <template x-for="product in {{ $products }}" :key="product.id">
                    <div x-show="selectedProduct === product.id" class="flex flex-col">
                        <img :src="'/storage/' + product.image" alt="" 
                             class="rounded-xl mb-4 w-full h-64 object-cover transition-transform duration-500 hover:scale-105" 
                             x-show="product.image">
                        <div class="bg-gray-200 h-64 w-full rounded-xl mb-4 flex items-center justify-center text-gray-500" 
                             x-show="!product.image">
                            No Image
                        </div>

                        <h3 class="text-2xl font-bold mb-2" x-text="product.name"></h3>
                        <p class="text-gray-700 mb-4" x-text="product.description"></p>
                        <p class="text-lg text-red-600 font-bold mb-2" x-text="'Ksh ' + product.price.toLocaleString()"></p>
                        <p class="text-sm text-gray-600 mb-4" x-text="'Stock: ' + product.stock"></p>

                        <form method="POST" :action="'/cart/' + product.id + '/add'">
                            @csrf
                            <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 bg-blue-700 text-white font-bold 
                                           px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="w-5 h-5 animate-[vibrate_0.3s_ease-in-out_infinite_alternate]"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m10-9l2 9m-6-9v9"/>
                                </svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-app-layout>
