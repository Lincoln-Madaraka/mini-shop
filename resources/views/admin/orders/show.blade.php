{{-- resources/views/admin/orders/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Order #{{ $order->id }}</h2>
    </x-slot>

    <div class="p-6 space-y-6">

        <!-- Customer Info -->
        <div class="bg-black/30 backdrop-blur-lg p-6 rounded-2xl shadow">
            <h3 class="text-lg font-semibold mb-3 text-pink-400">Customer Info</h3>
            <p class="text-white font-medium">{{ $order->user->name ?? 'Guest' }}</p>
            <p class="text-gray-400">{{ $order->user->email ?? 'N/A' }}</p>
        </div>

        <!-- Items -->
        <div class="bg-black/30 backdrop-blur-lg p-6 rounded-2xl shadow">
            <h3 class="text-lg font-semibold mb-3 text-pink-400">Order Items</h3>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left">
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
                    <tbody class="text-white">
                        @foreach ($order->items as $item)
                            <tr class="border-b border-gray-700">
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
        </div>

        <!-- Summary -->
        <div class="bg-black/30 backdrop-blur-lg p-6 rounded-2xl shadow">
            <h3 class="text-lg font-semibold mb-3 text-pink-400">Order Summary</h3>
            <p class="text-white font-medium">Total: KES {{ number_format($order->total, 2) }}</p>
            <p class="text-gray-400">Placed: {{ $order->created_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
</x-app-layout>
