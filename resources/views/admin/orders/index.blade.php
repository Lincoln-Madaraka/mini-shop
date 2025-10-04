{{-- resources/views/admin/orders/index.blade.php --}}
<x-app-layout>
    <x-slot name="header"></x-slot>

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div class="min-h-screen bg-white text-black flex">

        <!-- Sidebar (desktop only) -->
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
            class="flex items-center gap-3 bg-black hover:bg-white hover:text-black text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M16 21v-4H8v4h8zM3 13h18" />
                </svg>
                Manage Products
            </a>

            <a href="{{ route('admin.orders.index') }}"
            class="flex items-center gap-3 bg-white text-black p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
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
        <main class="flex-1 p-6 bg-white/10">
            <div class="max-w-7xl mx-auto">

                <!-- Page Title -->
                <h1 class="text-3xl text-black font-bold mb-8">Orders</h1>

                <!-- Orders Table (desktop only) -->
                <div class="hidden md:block overflow-x-auto bg-white">
                    <table class="min-w-full bg-white/10 backdrop-blur-lg rounded-xl shadow">
                        <thead>
                            <tr class="bg-white/20 text-left text-sm uppercase text-blue-800">
                                <th class="px-6 py-3">Order ID</th>
                                <th class="px-6 py-3">Customer</th>
                                <th class="px-6 py-3">Total</th>
                                <th class="px-6 py-3">Items</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse ($orders as $order)
                                <tr class="hover:bg-white/5">
                                    <td class="px-6 py-4">#{{ $order->id }}</td>
                                    <td class="px-6 py-4">{{ $order->user->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4">KES {{ number_format($order->total, 2) }}</td>
                                    <td class="px-6 py-4">{{ $order->items->count() }}</td>
                                    <td class="px-6 py-4">{{ $order->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                           class="px-3 py-1 bg-pink-600 hover:bg-pink-700 rounded-lg text-white text-sm">
                                           View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-300">No orders yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Orders as Cards (mobile only) -->
                <div class="md:hidden space-y-6 bg-white">
                    @forelse ($orders as $order)
                        <div class="bg-gray-100 backdrop-blur-lg p-4 rounded-2xl shadow">
                            <h2 class="text-lg font-semibold mb-2">Order #{{ $order->id }}</h2>
                            <p><span class="font-semibold">Customer:</span> {{ $order->user->name ?? 'N/A' }}</p>
                            <p><span class="font-semibold">Total:</span> KES {{ number_format($order->total, 2) }}</p>
                            <p><span class="font-semibold">Items:</span> {{ $order->items->count() }}</p>
                            <p><span class="font-semibold">Date:</span> {{ $order->created_at->format('d M Y') }}</p>
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                               class="mt-3 inline-block px-3 py-1 bg-pink-600 hover:bg-pink-700 rounded-lg text-white text-sm">
                               View Details
                            </a>
                        </div>
                    @empty
                        <p class="text-center text-gray-300">No orders yet.</p>
                    @endforelse
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
