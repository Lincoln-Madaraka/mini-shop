@extends('layout.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6 text-pink-600">Products</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach ($products as $product)
      <div class="bg-white shadow-md rounded-lg p-4">
        <img src="{{ asset('images/logo.png') }}" alt="product" class="w-full h-40 object-cover rounded">
        <h2 class="text-lg font-semibold mt-2">{{ $product->name }}</h2>
        <p class="text-gray-600">{{ $product->description }}</p>
        <p class="text-pink-600 font-bold mt-2">${{ number_format($product->price, 2) }}</p>
        <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-3">
          @csrf
          <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700">
            Add to Cart
          </button>
        </form>
      </div>
    @endforeach
  </div>
@endsection
