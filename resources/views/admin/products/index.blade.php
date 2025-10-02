@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-6">Products</h1>

<a href="{{ route('admin.products.create') }}"
   class="mb-4 inline-block bg-pink-400/90 px-4 py-2 rounded-lg shadow hover:scale-105 transition">
   + Add Product
</a>

<div class="hidden md:block">
  <table class="w-full bg-white/10 rounded-lg overflow-hidden">
    <thead>
      <tr class="bg-black/40 text-left">
        <th class="p-3">Name</th>
        <th class="p-3">Price</th>
        <th class="p-3">Stock</th>
        <th class="p-3">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr class="border-b border-white/20">
        <td class="p-3">{{ $product->name }}</td>
        <td class="p-3">${{ $product->price }}</td>
        <td class="p-3">{{ $product->stock }}</td>
        <td class="p-3 flex gap-2">
          <a href="{{ route('admin.products.edit',$product) }}" class="text-blue-400">Edit</a>
          <form method="POST" action="{{ route('admin.products.destroy',$product) }}">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-400">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- Mobile Cards --}}
<div class="grid md:hidden gap-4">
  @foreach ($products as $product)
  <div class="bg-white/10 rounded-lg p-4 shadow">
    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
    <p class="text-sm text-gray-300">${{ $product->price }} | Stock: {{ $product->stock }}</p>
    <div class="mt-3 flex gap-3">
      <a href="{{ route('admin.products.edit',$product) }}" class="text-blue-400">Edit</a>
      <form method="POST" action="{{ route('admin.products.destroy',$product) }}">
        @csrf @method('DELETE')
        <button type="submit" class="text-red-400">Delete</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
@endsection
