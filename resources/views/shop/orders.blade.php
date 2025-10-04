<x-app-layout>
    <div class="min-h-screen bg-cream p-6">
        <h2 class="text-3xl font-bold mb-6 text-black">My Orders</h2>

        @forelse($orders as $order)
            <div class="bg-white/90 backdrop-blur-lg border border-gray-300 rounded-2xl p-4 mb-6 shadow-lg">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-gray-900 font-bold">Checkout ID #{{ $order->id }}</span>
                    <span class="text-blue-700 font-semibold">Debited KES: {{ number_format($order->total, 2) }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($order->items as $item)
                        <div class="bg-white p-3 rounded-lg flex items-center gap-3 shadow-sm hover:shadow-md transition">
                            <img src="{{ $item->product->image ? asset('storage/'.$item->product->image) : asset('images/no-image.png') }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="h-16 w-16 object-cover rounded-lg border border-gray-200">

                            <div class="flex-1">
                                <p class="text-gray-900 font-semibold">{{ $item->product->name }}</p>
                                <p class="text-gray-600 text-sm">Qty: {{ $item->qty }}</p>
                                @if($item->product->description)
                                    <p class="text-gray-500 text-sm truncate">{{ $item->product->description }}</p>
                                @endif
                            </div>

                            <div class="text-black font-bold">
                              Total KES: {{ number_format($item->line_total, 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-gray-500">You have no orders yet.</p>
        @endforelse
    </div>
</x-app-layout>
