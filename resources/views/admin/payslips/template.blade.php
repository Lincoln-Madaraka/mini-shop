<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payslip</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Payslip - {{ $product->user->name }}</h2>

    <table>
        <tr><th>Gross Product</th><td>KES {{ number_format($product->gross_product) }}</td></tr>
        <tr><th>SHIF</th><td>KES {{ number_format($product->shif) }}</td></tr>
        <tr><th>Housing Levy</th><td>KES {{ number_format($product->housing_levy) }}</td></tr>
        <tr><th>PAYE (30%)</th><td>KES {{ number_format($product->paye) }}</td></tr>
        <tr><th>Net Product</th><td><strong>KES {{ number_format($product->net_product) }}</strong></td></tr>
    </table>
</body>
</html>
