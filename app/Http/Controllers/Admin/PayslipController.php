<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PayslipController extends Controller
{
    public function index()
    {
        $salaries = Product::with('user')->paginate(10);
        return view('admin.payslips.index', compact('salaries'));
    }

    public function show(Product $product)
    {
        return view('admin.payslips.show', compact('product'));
    }

    public function download(Product $product)
    {
        $pdf = PDF::loadView('admin.payslips.template', compact('product'));
        return $pdf->download("payslip_{$product->user->name}.pdf");
    }
}
