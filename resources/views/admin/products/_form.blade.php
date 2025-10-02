@csrf
<div class="space-y-4">
  <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
         placeholder="Product Name"
         class="w-full p-2 rounded text-black" required>

  <input type="number" name="price" step="0.01" value="{{ old('price', $product->price ?? '') }}"
         placeholder="Price"
         class="w-full p-2 rounded text-black" required>

  <input type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? '') }}"
         placeholder="Stock"
         class="w-full p-2 rounded text-black" required>

  <textarea name="description" rows="4"
            placeholder="Description"
            class="w-full p-2 rounded text-black">{{ old('description', $product->description ?? '') }}</textarea>

  <button type="submit"
          class="bg-pink-400/90 px-4 py-2 rounded-lg shadow hover:bg-pink-500 transition">
    Save
  </button>
</div>
