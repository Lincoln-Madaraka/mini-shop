{{-- resources/views/admin/orders/show.blade.php --}}
<x-app-layout>
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
               class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                Dashboard
            </a>

            <a href="{{ route('admin.product.index') }}"
               class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                Manage Products
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="flex items-center gap-3 bg-gradient-to-r from-pink-600 to-pink-400 p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                View Orders
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 bg-gradient-to-r from-purple-600 to-purple-400 p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                View Users
            </a>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 relative">
            <div class="max-w-7xl mx-auto space-y-6">

                <!-- Back Button -->
                <a href="{{ route('admin.orders.index') }}"
                   class="sm:absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition z-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="font-semibold text-white">Back</span>
                </a>

                <!-- Page Title -->
                <h1 class="text-3xl font-bold mb-4">Order #{{ $order->id }}</h1>

                <!-- Customer Info -->
                <div class="bg-black/30 backdrop-blur-lg p-6 rounded-2xl shadow">
                    <h3 class="text-lg font-semibold mb-3 text-pink-400">Customer Info</h3>
                    <p class="text-white font-medium">{{ $order->user->name ?? 'Guest' }}</p>
                    <p class="text-gray-400">{{ $order->user->email ?? 'N/A' }}</p>
                </div>

                <!-- Items Table (desktop) -->
                <div class="hidden md:block bg-black/30 backdrop-blur-lg p-6 rounded-2xl shadow overflow-x-auto">
                    <h3 class="text-lg font-semibold mb-3 text-pink-400">Order Items</h3>
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-700 to-blue-500 text-white">
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Product</th>
                                <th class="px-4 py-3">Qty</th>
                                <th class="px-4 py-3">Unit Price</th>
                                <th class="px-4 py-3">Line Total</th>
                                <th class="px-4 py-3">Stock</th>
                            </tr>
                        </thead>
                        <tbody class="text-white divide-y divide-gray-700">
                            @foreach ($order->items as $item)
                                <tr class="hover:bg-white/5">
                                    <td class="px-4 py-3">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" 
                                             class="h-14 w-14 rounded-xl object-cover shadow" />
                                    </td>
                                    <td class="px-4 py-3 font-semibold">{{ $item->product->name }}</td>
                                    <td class="px-4 py-3">{{ $item->qty }}</td>
                                    <td class="px-4 py-3">${{ number_format($item->unit_price, 2) }}</td>
                                    <td class="px-4 py-3">${{ number_format($item->line_total, 2) }}</td>
                                    <td class="px-4 py-3">
                                        @if ($item->product->stock > 0)
                                            <span class="bg-green-600 text-white px-3 py-1 rounded-xl text-sm shadow">
                                                In Stock ({{ $item->product->stock }})
                                            </span>
                                        @else
                                            <span class="bg-red-600 text-white px-3 py-1 rounded-xl text-sm shadow">
                                                Out of Stock
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Items as Cards (mobile) -->
                <div class="md:hidden space-y-4">
                    @foreach ($order->items as $item)
                        <div class="bg-black/30 backdrop-blur-lg p-4 rounded-2xl shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="{{ asset('storage/' . $item->product->image) }}" 
                                     class="h-16 w-16 rounded-xl object-cover shadow" />
                                <div>
                                    <p class="font-semibold text-white">{{ $item->product->name }}</p>
                                    <p class="text-gray-400">Qty: {{ $item->qty }}</p>
                                </div>
                            </div>
                            <p class="text-white">Unit Price: ${{ number_format($item->unit_price, 2) }}</p>
                            <p class="text-white">Line Total: ${{ number_format($item->line_total, 2) }}</p>
                            <p>
                                @if ($item->product->stock > 0)
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-xl text-sm shadow">
                                        In Stock ({{ $item->product->stock }})
                                    </span>
                                @else
                                    <span class="bg-red-600 text-white px-3 py-1 rounded-xl text-sm shadow">
                                        Out of Stock
                                    </span>
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="bg-black/30 backdrop-blur-lg p-6 rounded-2xl shadow">
                    <h3 class="text-lg font-semibold mb-3 text-pink-400">Order Summary</h3>
                    <p class="text-white font-medium">Total: KES {{ number_format($order->total, 2) }}</p>
                    <p class="text-gray-400">Placed: {{ $order->created_at->format('M d, Y H:i') }}</p>
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
