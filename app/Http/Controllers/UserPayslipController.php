<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class UserPayslipController extends Controller
{
    public function download(Product $product)
    {
    if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // ✅ Generate the PDF
        $pdf = Pdf::loadView('pdf.payslip', ['product' => $product]);

        return $pdf->download('payslip_' . now()->format('Ymd_His') . '.pdf');
    }
}