@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Product</h1>

<form method="POST" action="{{ route('admin.products.update', $product) }}">
  @method('PUT')
  @include('admin.products._form')
</form>
@endsection
