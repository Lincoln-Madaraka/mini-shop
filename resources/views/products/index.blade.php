@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Product Catalog</h1>

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach ($products as $product)
  <div class="bg-white/10 rounded-xl p-4 shadow hover:scale-105 transition">
    <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
    <p class="text-gray-300 mb-2">${{ number_format($product->price, 2) }}</p>
    <p class="text-sm text-gray-400 mb-4">Stock: {{ $product->stock }}</p>
    <a href="{{ route('products.show', $product) }}"
       class="inline-block bg-pink-400/90 px-3 py-1 rounded-lg hover:bg-pink-500 transition">
       View Details
    </a>
  </div>
  @endforeach
</div>

<div class="mt-6">
  {{ $products->links() }}
</div>
@endsection

