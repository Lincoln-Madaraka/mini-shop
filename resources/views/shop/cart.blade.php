<x-app-layout>
    <div class="min-h-screen bg-cream text-black flex flex-col p-6 relative">

        {{-- Back Button --}}
        <a href="{{ url()->previous() }}" 
           class="sm:absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="font-semibold text-black">Back</span>
        </a>

        {{-- Page Container --}}
        <div class="max-w-4xl mx-auto w-full mt-12 sm:mt-0">
            <h2 class="text-3xl font-bold mb-6 text-black">Your Cart</h2>

            {{-- Success Modal --}}
            @if(session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show"
                    x-transition
                    class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-50"
                >
                    <div class="bg-white p-6 rounded-2xl shadow-lg relative text-center max-w-sm w-full">
                        <button 
                            @click="show = false" 
                            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800"
                        >
                            ✕
                        </button>
                        <div class="text-blue-800 font-semibold text-lg">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Error Message (kept normal for now) --}}
            @if(session('error'))
                <div class="p-3 bg-red-600 text-white mb-4 rounded-lg">{{ session('error') }}</div>
            @endif

            {{-- Empty Cart --}}
            @if(count($cart) === 0)
                <div class="p-6 bg-white/10 backdrop-blur-lg rounded-2xl text-center text-gray-400">
                    Your cart is empty.
                </div>
            @else
                {{-- Cart Items --}}
                <div class="flex flex-col gap-4">
                    @foreach($cart as $item)
                        <div class="bg-[#f5f2e9]/95 backdrop-blur-lg p-4 rounded-2xl shadow-lg flex flex-col sm:flex-row sm:items-center gap-4 transition hover:scale-[1.02] border border-gray-300">

                            {{-- Product Image --}}
                            <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('images/no-image.png') }}" 
                                 class="w-full sm:w-24 h-32 sm:h-24 object-cover rounded-lg shadow-md" alt="">

                            {{-- Product Info & Quantity --}}
                            <div class="flex-1 flex flex-col gap-2">
                                <div class="font-semibold text-gray-900 text-lg">{{ $item['name'] }}</div>
                                <div class="text-gray-700 text-sm">Kes {{ number_format($item['price'], 2) }}</div>
                                <div class="text-gray-500 text-sm mt-1">Stock: {{ $item['stock'] }}</div>

                                {{-- Quantity Controls --}}
                                <div class="flex gap-2 mt-2 sm:mt-1">
                                    <form method="POST" action="{{ route('cart.update', $item['id']) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ max(1, $item['quantity'] - 1) }}">
                                        <button type="submit" 
                                            class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 transition" 
                                            @if($item['stock'] <= 1) disabled @endif>-</button>
                                    </form>

                                    <div class="px-3 text-gray-900 font-bold text-lg">{{ $item['quantity'] }}</div>

                                    <form method="POST" action="{{ route('cart.update', $item['id']) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ min($item['stock'], $item['quantity'] + 1) }}">
                                        <button type="submit" 
                                            class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 transition" 
                                            @if($item['stock'] <= $item['quantity']) disabled @endif>+</button>
                                    </form>
                                </div>
                            </div>

                            {{-- Price + Remove (mobile stacked) --}}
                            <div class="w-full flex flex-row justify-between items-center mt-4 sm:flex-col sm:items-end sm:mt-0">
                                <div class="flex flex-row sm:flex-col items-center gap-2">
                                    <span class="font-semibold text-gray-900">Total <span class="hidden sm:inline">Amount</span>:</span>
                                    <span class="text-blue-700 font-bold text-lg">{{ number_format($item['price'] * $item['quantity'], 2) }} Ksh</span>
                                </div>

                                <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-500 transition">
                                        Remove
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>

                {{-- Checkout Button --}}
                <div class="mt-6 text-right">
                    <a href="{{ route('shop.checkout') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-700 text-white font-bold hover:bg-blue-600 transition relative">
                        <span>Proceed to Checkout</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                             class="w-6 h-6 animate-bounce-x">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Arrow bounce animation --}}
    <style>
        @keyframes bounce-x {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(4px); }
        }
        .animate-bounce-x {
            animation: bounce-x 0.8s infinite ease-in-out;
        }
    </style>
</x-app-layout>
