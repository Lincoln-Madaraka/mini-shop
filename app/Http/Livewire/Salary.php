<?php

namespace App\Http\Livewire;

use App\Models\Product as ProductModel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public $productIdBeingEdited = null;
    public $user_id;
    public $gross_product;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'gross_product' => 'required|numeric|min:0',
    ];

    public function store()
    {
        $this->validate();

        // Check if employee already has a product (if not editing)
        $existing = ProductModel::where('user_id', $this->user_id)->first();
        if ($existing && !$this->productIdBeingEdited) {
            session()->flash('error', 'This employee already has an assigned product. Edit the existing record instead.');
            return;
        }

        // Calculate deductions
        $shif = $this->gross_product * 0.05;
        $housing_levy = $this->gross_product * 0.05;
        $paye = $this->gross_product * 0.3;
        $net_product = $this->gross_product - ($shif + $housing_levy + $paye);

        if ($this->productIdBeingEdited) {
            $product = ProductModel::findOrFail($this->productIdBeingEdited);
            $product->update([
                'user_id' => $this->user_id,
                'amount' => $net_product,
                'gross_product' => $this->gross_product,
                'shif' => $shif,
                'housing_levy' => $housing_levy,
                'paye' => $paye,
                'net_product' => $net_product,
            ]);

            session()->flash('message', 'Product updated successfully!');
        } else {
            ProductModel::create([
                'user_id' => $this->user_id,
                'amount' => $net_product,
                'gross_product' => $this->gross_product,
                'shif' => $shif,
                'housing_levy' => $housing_levy,
                'paye' => $paye,
                'net_product' => $net_product,
            ]);

            session()->flash('message', 'Product assigned successfully!');
        }

        $this->reset(['user_id', 'gross_product', 'productIdBeingEdited']);
    }

    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);
        $this->productIdBeingEdited = $product->id;
        $this->user_id = $product->user_id;
        $this->gross_product = $product->gross_product;
    }

    public function delete($id)
    {
        ProductModel::findOrFail($id)->delete();
        session()->flash('message', 'Product record deleted.');
    }

    public function cancelEdit()
    {
        $this->reset(['user_id', 'gross_product', 'productIdBeingEdited']);
    }

    public function render()
    {
        return view('livewire.product', [
            'salaries' => ProductModel::with('user')->paginate(15),
            'users' => User::select('id', 'name')->get(),
        ]);
    }
    public function confirmDelete($id)
    {
        $this->delete($id);
    }

}

