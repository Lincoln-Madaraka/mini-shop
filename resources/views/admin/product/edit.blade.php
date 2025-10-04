<x-app-layout>
    <x-slot name="header"></x-slot>

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div class="min-h-screen bg-gray-100 text-black flex">


        <!-- Main Content -->
        <main class="flex-1 p-6 relative">

            <!-- Back Button -->
            <a href="{{ route('admin.product.index') }}" class="absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-semibold text-black">Back</span>
            </a>

            <div class="max-w-3xl mx-auto mt-12">

                <h1 class="text-3xl font-bold mb-8">Edit Product</h1>

                <x-session-message />

                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white/10 backdrop-blur-lg p-6 rounded-xl space-y-4">
                    @csrf
                    @method('PATCH')

                    <!-- Product Name -->
                    <div>
                        <label class="block mb-1 font-semibold">Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full rounded px-3 py-2 text-black" required>
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block mb-1 font-semibold">Price ($)</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full rounded px-3 py-2 text-black" min="0.01" step="0.01" required>
                        @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label class="block mb-1 font-semibold">Stock</label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full rounded px-3 py-2 text-black" min="0" required>
                        @error('stock') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block mb-1 font-semibold">Description</label>
                        <textarea name="description" class="w-full rounded px-3 py-2 text-black">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block mb-1 font-semibold">Product Image</label>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-32 h-32 mb-2 rounded">
                        @endif
                        <input type="file" name="image" accept="image/*" class="w-full rounded px-3 py-2 text-black">
                        @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-green-600 rounded text-white font-semibold hover:bg-green-500 transition">Update Product</button>
                    </div>
                </form>
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
