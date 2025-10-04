<x-app-layout>
    <div class="min-h-screen bg-cream p-6">
        <h2 class="text-3xl font-bold mb-6 text-black">My Orders</h2>

        @forelse($orders as $order)
            <div class="bg-gradient-to-br from-blue-900 via-black to-gray-700 p-4 rounded-2xl mb-6 shadow-lg">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-white font-bold">Order #{{ $order->id }}</span>
                    <span class="text-yellow-400 font-semibold">Total: Ksh {{ number_format($order->total, 2) }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($order->items as $item)
                        <div class="bg-black/20 p-2 rounded-lg flex items-center gap-3">
                            <img src="{{ $item->product->image ? asset('storage/'.$item->product->image) : asset('images/no-image.png') }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="h-16 w-16 object-cover rounded">

                            <div class="flex-1">
                                <p class="text-white font-semibold">{{ $item->product->name }}</p>
                                <p class="text-gray-300 text-sm">Qty: {{ $item->qty }}</p>
                            </div>

                            <div class="text-yellow-500 font-bold">
                                Ksh {{ number_format($item->line_total, 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-gray-400">You have no orders yet.</p>
        @endforelse
    </div>
</x-app-layout>
