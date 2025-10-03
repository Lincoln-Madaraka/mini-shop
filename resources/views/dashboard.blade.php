<x-app-layout>
    <div class="min-h-screen bg-cream text-black flex flex-col" x-data="{ open: false, selectedProduct: null }">

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold mb-8">Product Catalog</h2>

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
            </div>
        </main>

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
