@extends('admin.layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">Payslip: {{ $product->user->name }}</h2>

<div class="bg-white p-4 shadow rounded">
    <ul>
        <li><strong>Gross:</strong> KES {{ number_format($product->gross_product) }}</li>
        <li><strong>SHIF 5%:</strong> KES {{ number_format($product->shif) }}</li>
        <li><strong>Housing Levy 5%:</strong> KES {{ number_format($product->housing_levy) }}</li>
        <li><strong>PAYE 30%:</strong> KES {{ number_format($product->paye) }}</li>
        <li><strong>Net Product:</strong> KES {{ number_format($product->net_product) }}</li>
    </ul>

    <a href="{{ route('admin.payslips.download', $product->id) }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Download PDF
    </a>
</div>
@endsection
