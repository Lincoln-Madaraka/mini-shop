@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white/10 rounded-xl p-6 shadow">
  <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
  <p class="text-xl text-pink-300 mb-2">${{ number_format($product->price, 2) }}</p>
  <p class="text-gray-300 mb-4">Stock: {{ $product->stock }}</p>
  <p class="text-gray-200 mb-6">{{ $product->description }}</p>

  <form action="{{ route('cart.add') }}" method="POST" class="flex gap-3">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="number" name="qty" value="1" min="1" class="w-20 text-black rounded p-2">
    <button type="submit"
            class="bg-pink-400/90 px-4 py-2 rounded-lg shadow hover:bg-pink-500 transition">
      Add to Cart
    </button>
  </form>
</div>
@endsection
