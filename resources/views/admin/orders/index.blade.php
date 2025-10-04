{{-- resources/views/admin/orders/index.blade.php --}}
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
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">

                <!-- Page Title -->
                <h1 class="text-3xl font-bold mb-8">Orders</h1>

                <!-- Orders Table (desktop only) -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full bg-white/10 backdrop-blur-lg rounded-xl shadow">
                        <thead>
                            <tr class="bg-white/20 text-left text-sm uppercase text-gray-200">
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
                <div class="md:hidden space-y-6">
                    @forelse ($orders as $order)
                        <div class="bg-white/10 backdrop-blur-lg p-4 rounded-2xl shadow">
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
