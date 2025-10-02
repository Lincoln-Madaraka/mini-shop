@extends('layouts.app')
@section('content')
<div class="text-center">
  <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
  <a href="{{ route('admin.products.index') }}"
     class="inline-block bg-pink-400/90 px-4 py-2 rounded-lg shadow hover:scale-105 transition">
     Manage Products
  </a>
</div>
@endsection
