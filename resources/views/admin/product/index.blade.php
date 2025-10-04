<x-app-layout>
    <x-slot name="header"></x-slot>

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div class="min-h-screen bg-white text-black flex">

        <!-- Sidebar -->
          <aside class="hidden md:flex flex-col w-64 bg-gray-800 backdrop-blur-lg p-6 space-y-4">
            <h2 class="text-lg text-yellow-200 font-bold mb-6">Quick Links</h2>

            <a href="{{ route('admin.index') }}"
            class="flex items-center gap-3 bg-black text-white p-3 rounded-xl font-semibold shadow hover:bg-white hover:text-black hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.product.index') }}"
            class="flex items-center gap-3 bg-white text-black p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M16 21v-4H8v4h8zM3 13h18" />
                </svg>
                Manage Products
            </a>

            <a href="{{ route('admin.orders.index') }}"
            class="flex items-center gap-3 bg-black hover:bg-white hover:text-black text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13" />
                </svg>
                View Orders
            </a>

            <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 bg-black hover:bg-white hover:text-black text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6v-2a4 4 0 00-3-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
                View Users
            </a>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 relative">

            <!-- Back Button -->
            <a href="{{ route('admin.index') }}" class="absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-semibold text-black">Back</span>
            </a>

            <div class="max-w-7xl mx-auto mt-12">
                <h1 class="text-3xl font-bold mb-8">Products</h1>

                <x-session-message />

                <!-- Add Product Button -->
                <button onclick="location.href='{{ route('admin.product.create') }}';" class="px-4 py-1 mb-4 bg-blue-600 rounded text-white font-semibold">Add Product</button>

               <!-- Products Table (desktop) -->
                <div class="hidden md:block bg-white/10 backdrop-blur-lg rounded-xl overflow-auto">
                    <table class="text-left w-full border-collapse table-auto">
                        <colgroup>
                            <col class="w-16"> <!-- Image -->
                            <col class="w-12"> <!-- ID -->
                            <col class="w-64"> <!-- Name -->
                            <col class="w-24"> <!-- Price -->
                            <col class="w-24"> <!-- Stock -->
                            <col class="w-48"> <!-- Manage -->
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Image</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">ID</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Name</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Price</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Stock</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr class="hover:bg-white/20">
                                    <!-- Image column -->
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @if($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product" class="w-12 h-12 rounded mx-auto">
                                        @endif
                                    </td>

                                    <!-- ID -->
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product->id }}</td>

                                    <!-- Name -->
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <span class="truncate">{{ $product->name }}</span>
                                    </td>

                                    <!-- Price -->
                                    <td class="py-4 px-6 border-b border-grey-light">KES {{ $product->price }}</td>

                                    <!-- Stock -->
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product->stock }}</td>

                                    <!-- Manage -->
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <div x-data="{ open: false }" class="relative">
                                        <!-- View Button -->
                                        <button @click="open = true" class="px-4 py-1 bg-blue-600 rounded text-white hover:bg-blue-500 transition">
                                            View
                                        </button>

                                        <!-- Modal -->
                                        <div 
                                            x-show="open" 
                                            x-transition 
                                            class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                                        >
                                            <div @click.away="open = false" class="bg-gradient-to-br from-black via-black to-gray-900 text-white rounded-2xl p-6 w-96 max-w-full shadow-lg space-y-4">
                                                <h2 class="text-xl font-bold">Manage Product</h2>
                                                <p class="text-gray-300 truncate">{{ $product->name }}</p>

                                                <div class="flex justify-end gap-2 mt-4">
                                                    <button @click="open = false; location.href='{{ route('admin.product.edit', $product->id) }}';" class="px-4 py-1 bg-green-600 rounded hover:bg-green-500 transition text-white">Edit</button>
                                                    <form method="POST" action="{{ route('admin.product.destroy', $product->id) }}" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-4 py-1 bg-red-600 rounded hover:bg-red-500 transition text-white">Delete</button>
                                                    </form>
                                                </div>

                                                <!-- Close X -->
                                                <button @click="open = false" class="absolute top-2 right-2 text-gray-300 hover:text-white text-xl font-bold">&times;</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

             


                <!-- Mobile Cards -->
                <div class="md:hidden space-y-4">
                    @foreach($products as $product)
                        <div class="bg-white/10 backdrop-blur-lg p-4 rounded-xl flex flex-col gap-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    @if($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" alt="Product" class="w-10 h-10 rounded">
                                    @endif
                                    <span class="font-semibold">{{ $product->name }}</span>
                                </div>
                                <span class="text-black">KES {{ $product->price }}</span>
                            </div>
                            <div class="text-black">Stock: {{ $product->stock }}</div>
                            <div class="flex gap-2 mt-2">
                                <button onclick="location.href='{{ route('admin.product.edit', $product->id) }}';" class="flex-1 px-4 py-1 bg-green-600 rounded text-white hover:opacity-80">Edit</button>
                                <form method="POST" action="{{ route('admin.product.destroy', $product->id) }}" class="flex-1" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-4 py-1 bg-red-600 rounded text-white hover:opacity-80">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">{!! $products->links() !!}</div>
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
