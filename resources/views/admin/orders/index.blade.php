{{-- resources/views/admin/orders/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Customer Orders</h2>
    </x-slot>

    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-black/30 backdrop-blur-lg rounded-2xl shadow-lg">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-700 to-blue-500 text-white text-left">
                        <th class="px-4 py-3 rounded-tl-2xl">Order ID</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 rounded-tr-2xl">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-white">
                    @forelse ($orders as $order)
                        <tr class="border-b border-gray-700 hover:bg-white/10 transition">
                            <td class="px-4 py-3 font-semibold">#{{ $order->id }}</td>
                            <td class="px-4 py-3">
                                {{ $order->user->name ?? 'Guest' }}
                                <br>
                                <span class="text-sm text-gray-400">{{ $order->user->email ?? '' }}</span>
                            </td>
                            <td class="px-4 py-3">${{ number_format($order->total, 2) }}</td>
                            <td class="px-4 py-3">{{ $order->created_at->format('M d, Y H:i') }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                   class="bg-gradient-to-r from-pink-600 to-pink-400 text-white px-4 py-2 rounded-xl shadow hover:opacity-90 transition">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-400">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
