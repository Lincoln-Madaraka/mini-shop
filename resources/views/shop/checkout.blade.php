<x-app-layout>
    <div class="min-h-screen bg-cream text-black flex flex-col p-6 relative">

        {{-- Back Button --}}
        <a href="{{ route('shop.cart') }}" 
           class="sm:absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="font-semibold text-black">Back</span>
        </a>

        <div class="max-w-4xl mx-auto w-full mt-12 sm:mt-0">
            <h2 class="text-3xl font-bold mb-6 text-black">Checkout</h2>

            <div class="bg-gray-800 p-6 rounded-2xl shadow-lg flex flex-col gap-4">

                {{-- Check if cart is empty --}}
                @if(empty($cart) || count($cart) === 0)
                    <div class="text-center py-12">
                        <p class="text-white text-xl font-semibold mb-4">
                            Your cart is empty!
                        </p>
                        <p class="text-gray-300 mb-6">
                            Please add items to your cart before checking out.
                        </p>
                        <a href="{{ route('dashboard') }}" 
                           class="inline-block bg-red-600 hover:bg-red-500 text-white px-6 py-3 rounded-lg font-bold transition">
                            Browse Products
                        </a>
                    </div>
                @else
                    {{-- Cart Items Review --}}
                    @foreach($cart as $item)
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-gray-800 p-4 rounded-lg">
                            <div class="flex items-center gap-4">
                                <img src="{{ $item['image'] ? asset('storage/'.$item['image']) : asset('images/no-image.png') }}" class="w-20 h-20 object-cover rounded" alt="">
                                <div>
                                    <div class="font-semibold text-white">{{ $item['name'] }}</div>
                                    <div class="text-gray-200 text-sm">Qty: {{ $item['quantity'] }}</div>
                                </div>
                            </div>
                            <div class="text-yellow-500 font-bold text-lg mt-2 sm:mt-0">Ksh {{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                        </div>
                    @endforeach

                    {{-- Total --}}
                    <div class="flex justify-between items-center mt-4 text-lg font-bold text-white">
                        <span>Total:</span>
                        <span>Ksh {{ number_format($total, 2) }}</span>
                    </div>

                    {{-- Confirm Order Button --}}
                   <form method="POST" action="{{ route('shop.checkout.store') }}" class="mt-4">
                    @csrf
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <!-- Payment Options -->
                        <div class="flex items-center gap-3">
                            <!-- Mpesa (always visible) -->
                            <img src="{{ asset('import/assets/mpesa.jpeg') }}" 
                                alt="Mpesa" 
                                class="h-8 w-auto">

                            <!-- Mastercard + Paypal (hidden on mobile, visible sm+) -->
                            <img src="{{ asset('import/assets/mastercard.png') }}" 
                                alt="Mastercard" 
                                class="h-8 w-auto">
                            <img src="{{ asset('import/assets/paypal.png') }}" 
                                alt="PayPal" 
                                class="h-8 w-auto">
                        </div>

                        <!-- Confirm Order Button -->
                        <button type="submit" 
                                class="w-full sm:w-auto bg-white hover:bg-green-900 hover:text-white text-black px-6 py-3 rounded-lg font-bold transition">
                            Confirm Order
                        </button>
                    </div>
                </form>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
