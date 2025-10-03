<x-app-layout>
  <div class="max-w-4xl mx-auto p-6">
    @if(session('success')) <div class="p-3 bg-green-600 text-white mb-4">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="p-3 bg-red-600 text-white mb-4">{{ session('error') }}</div> @endif

    <h2 class="text-2xl font-bold mb-4">Your Cart</h2>

    @if(count($cart) === 0)
      <div class="p-4 bg-black/20 rounded">Your cart is empty.</div>
    @else
      <div class="space-y-4">
        @foreach($cart as $item)
          <div class="flex items-center justify-between bg-black/30 p-3 rounded-lg">
            <div class="flex items-center gap-4">
              <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('images/no-image.png') }}" class="w-20 h-20 object-cover rounded" alt="">
              <div>
                <div class="font-semibold">{{ $item['name'] }}</div>
                <div class="text-sm text-gray-400">Ksh {{ number_format($item['price'], 2) }}</div>
              </div>
            </div>

            <div class="flex items-center gap-3">
              <form method="POST" action="{{ route('cart.update', $item['id']) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="quantity" value="{{ max(1, $item['quantity'] - 1) }}">
                <button type="submit" class="px-3 py-1 rounded-lg" @if($item['stock'] <= 1) disabled @endif>-</button>
              </form>

              <div class="px-4">{{ $item['quantity'] }}</div>

              <form method="POST" action="{{ route('cart.update', $item['id']) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="quantity" value="{{ min($item['stock'], $item['quantity'] + 1) }}">
                <button type="submit" class="px-3 py-1 rounded-lg" @if($item['stock'] <= $item['quantity']) disabled @endif>+</button>
              </form>
            </div>

            <div class="flex items-center gap-3">
              <div class="text-sm">Ksh {{ number_format($item['price'] * $item['quantity'], 2) }}</div>

              <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 rounded bg-red-600 text-white">Remove</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>

      <div class="mt-6 text-right">
        <a href="#" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-pink-600 text-white font-bold">
          Proceed to Checkout →
        </a>
      </div>
    @endif
  </div>
</x-app-layout>
