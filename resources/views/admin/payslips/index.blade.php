@extends('admin.layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">Payslips</h2>

<table class="w-full table-auto bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="px-4 py-2">Employee</th>
            <th class="px-4 py-2">Gross</th>
            <th class="px-4 py-2">Net</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salaries as $product)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $product->user->name }}</td>
                <td class="px-4 py-2">KES {{ number_format($product->gross_product) }}</td>
                <td class="px-4 py-2">KES {{ number_format($product->net_product) }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.payslips.show', $product->id) }}" class="text-blue-600 hover:underline">View</a> |
                    <a href="{{ route('admin.payslips.download', $product->id) }}" class="text-green-600 hover:underline">Download</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $salaries->links() }}
</div>
@endsection
