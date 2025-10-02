@extends('layouts.app')
@section('content')
<div>
  <h1 class="text-3xl font-bold mb-4">Welcome back, {{ auth()->user()->name }}</h1>

  <div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white/10 rounded-xl p-4 shadow">
      <h2 class="text-xl font-semibold mb-2">Recent Orders</h2>
      {{-- Loop recent orders --}}
      <ul class="space-y-2">
        <li class="bg-black/30 p-3 rounded-lg">Order #1234 – Completed</li>
      </ul>
    </div>

    <div class="bg-white/10 rounded-xl p-4 shadow">
      <h2 class="text-xl font-semibold mb-2">Quick Links</h2>
      <a href="{{ route('products.index') }}" class="underline hover:text-pink-400">Browse Catalog</a>
    </div>
  </div>
</div>
@endsection
