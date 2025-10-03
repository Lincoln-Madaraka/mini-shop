<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Livewire\Component;

class UserProductTable extends Component
{
    public $products;

    public function mount()
    {
        // Load the logged-in user's salaries from DB
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.user-product-table');
    }
}
