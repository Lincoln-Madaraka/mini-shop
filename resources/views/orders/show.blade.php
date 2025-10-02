@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white/10 rounded-xl p-6 shadow">
  <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>
  <p class="mb-2 text-gray-300">Placed on {{ $order->created_at->format('M d, Y H:i') }}</p>
  <p class="mb-4 text-pink-300 font-semibold">Total: ${{ number_format($order->total,2) }}</p>

  <h2 class="font-semibold mb-2">Items</h2>
  <ul class="space-y-2">
    @foreach ($order->orderItems as $item)
    <li class="bg-black/30 rounded-lg p-3">
      {{ $item->product->name }}  
      ({{ $item->qty }} × ${{ number_format($item->unit_price,2) }})
      = <span class="text-pink-300">${{ number_format($item->line_total,2) }}</span>
    </li>
    @endforeach
  </ul>
</div>
@endsection
