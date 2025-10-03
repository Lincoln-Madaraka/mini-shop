<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category; // if needed
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.product.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        $categories = Category::all(); // optional
        return view('admin.product.create', compact('categories'));
    }

    // Store new product
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.product.index')
                         ->with('success', 'Product added successfully!');
    }

    // Show form to edit a product
    public function edit(Product $product)
    {
        $categories = Category::all(); // optional
        return view('admin.product.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.product.index')
                         ->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.product.index')
                         ->with('success', 'Product deleted successfully!');
    }
}
