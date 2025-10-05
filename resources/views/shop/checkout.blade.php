<x-app-layout>
    <div class="min-h-screen bg-cream text-black flex flex-col p-6 relative"
         x-data="{ showOrderModal: {{ session('order_success') ? 'true' : 'false' }} }">

        {{-- 🔙 Back Button --}}
        <a href="{{ route('shop.cart') }}" 
           class="sm:absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                 stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="font-semibold text-black">Back</span>
        </a>

        {{-- Checkout Container --}}
        <div class="max-w-4xl mx-auto w-full mt-12 sm:mt-0">
            <h2 class="text-3xl font-bold mb-6 text-black text-center">Checkout</h2>

            <div class="bg-white/90 backdrop-blur-lg p-6 rounded-2xl shadow-xl border border-gray-200">

                {{-- Empty Cart --}}
                @if(empty($cart) || count($cart) === 0)
                    <div class="text-center py-12">
                        <p class="text-gray-800 text-xl font-semibold mb-4">Your cart is empty!</p>
                        <p class="text-gray-500 mb-6">Please add items to your cart before checking out.</p>
                        <a href="{{ route('dashboard') }}" 
                           class="inline-block bg-blue-700 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-bold transition">
                            Browse Products
                        </a>
                    </div>
                @else
                    {{-- Cart Items --}}
                    @foreach($cart as $item)
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-gray-100 p-4 rounded-xl border border-gray-200 hover:shadow-md transition">
                            <div class="flex items-center gap-4">
                                <img src="{{ $item['image'] ? asset('storage/'.$item['image']) : asset('images/no-image.png') }}" 
                                     class="w-20 h-20 object-cover rounded-lg" alt="">
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $item['name'] }}</div>
                                    <div class="text-gray-700 text-sm">Qty: {{ $item['quantity'] }}</div>
                                </div>
                            </div>
                            <div class="text-blue-700 font-bold text-lg mt-2 sm:mt-0">
                                Ksh {{ number_format($item['price'] * $item['quantity'], 2) }}
                            </div>
                        </div>
                    @endforeach

                    {{-- Total --}}
                    <div class="flex justify-between items-center mt-4 text-lg font-bold text-gray-900">
                        <span>Total:</span>
                        <span>Ksh {{ number_format($total, 2) }}</span>
                    </div>

                    {{-- Confirm Order --}}
                    <form method="POST" action="{{ route('shop.checkout.store') }}" class="mt-4">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('import/assets/mpesa.jpeg') }}" class="h-8 w-auto" alt="Mpesa">
                                <img src="{{ asset('import/assets/mastercard.png') }}" class="h-8 w-auto" alt="Mastercard">
                                <img src="{{ asset('import/assets/paypal.png') }}" class="h-8 w-auto" alt="PayPal">
                            </div>

                            <button type="submit" 
                                    class="w-full sm:w-auto bg-blue-700 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-bold transition shadow-md hover:shadow-blue-300/40">
                                Confirm Order
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        {{-- 🛍 Order Summary Modal --}}
        @php
            $orderItems = session('order_cart_items', []);
        @endphp

        <div x-show="showOrderModal" x-transition.opacity
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-md p-4">

            <div class="bg-white/95 backdrop-blur-lg text-gray-900 
                        p-6 rounded-2xl border border-gray-300 max-w-lg w-full relative flex flex-col shadow-2xl animate-fadeUp">

                {{-- ❌ Close Button --}}
                <button @click="showOrderModal = false; window.location.reload();" 
                        class="absolute top-3 right-3 text-gray-600 text-3xl font-bold px-3 py-1 rounded-full 
                               bg-gray-200 hover:bg-gray-300 transition">
                    &times;
                </button>

                {{-- 🎉 Header --}}
                <h3 class="text-2xl font-bold mb-3 text-center text-blue-800">Thank You for Shopping!</h3>
                <p class="text-center text-gray-600 mb-4">Your order has been placed successfully. Here’s your summary:</p>

                {{-- 📦 Ordered Items --}}
            <div class="flex flex-col gap-3 mb-4 max-h-64 overflow-y-auto">
    @php $total = 0; @endphp

    @foreach($orderItems as $item)
        @php $total += $item['price'] * $item['quantity']; @endphp

        <div class="flex items-center gap-3 bg-gray-50 rounded-lg p-3 shadow-sm hover:shadow-md transition">
            <img src="{{ $item['image'] ? asset('storage/'.$item['image']) : asset('images/no-image.png') }}" 
                 class="w-16 h-16 object-cover rounded-lg" alt="">
            <div>
                <p class="font-semibold text-gray-800">{{ $item['name'] }}</p>
                <p class="text-gray-600 text-sm">{{ $item['description'] ?? '' }}</p>
                <p class="text-gray-700 text-sm">Qty: {{ $item['quantity'] }}</p>
                <p class="text-blue-700 font-bold text-sm">Ksh {{ number_format($item['price'] * $item['quantity'], 2) }}</p>
            </div>
        </div>
    @endforeach
</div>
   
                {{-- Total & Order ID --}}
                <div class="border-t border-gray-300 pt-3 text-sm">
                    <p><span class="font-semibold">Order ID:</span> {{ session('order_id') ?? 'ORD-' . rand(10000,99999) }}</p>
                    <p><span class="font-semibold">Total:</span> Ksh {{ number_format($total, 2) }}</p>
                    <p><span class="font-semibold">Payment Method:</span> Mpesa</p>
                </div>

                {{-- 🔗 View Orders Button --}}
                <div class="mt-6 flex justify-center">
                    <a href="{{ route('shop.orders') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-700 text-white font-bold hover:bg-blue-600 transition shadow-md hover:shadow-blue-300/40">
                        <span>View Order</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                             stroke-width="2" stroke="currentColor" 
                             class="w-6 h-6 animate-bounce-x">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- 🔹 Animations --}}
    <style>
        @keyframes bounce-x {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(6px); }
        }
        .animate-bounce-x {
            animation: bounce-x 0.8s infinite ease-in-out;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeUp {
            animation: fadeUp 0.4s ease-out;
        }
    </style>
</x-app-layout>
