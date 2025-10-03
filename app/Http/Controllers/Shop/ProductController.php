<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
