@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Your Cart</h1>

@if(empty($cart))
  <p class="text-gray-300">Your cart is empty.</p>
@else
  <div class="bg-white/10 rounded-xl p-6 shadow space-y-4">
    @foreach ($cart as $line)
      <div class="flex justify-between items-center border-b border-white/20 pb-2">
        <div>
          <p class="font-semibold">{{ $line['name'] }}</p>
          <p class="text-gray-300 text-sm">{{ $line['qty'] }} × ${{ number_format($line['price'],2) }}</p>
        </div>
        <form action="{{ route('cart.remove') }}" method="POST">
          @csrf
          <input type="hidden" name="product_id" value="{{ $line['product_id'] }}">
          <button type="submit" class="text-red-400 hover:text-red-500">Remove</button>
        </form>
      </div>
    @endforeach
  </div>

  <div class="mt-6 flex justify-between items-center">
    <a href="{{ route('products.index') }}" class="underline hover:text-pink-300">Continue Shopping</a>
    <a href="{{ route('checkout.store') }}"
       class="bg-pink-400/90 px-4 py-2 rounded-lg hover:bg-pink-500 shadow transition">
       Checkout
    </a>
  </div>
@endif
@endsection
