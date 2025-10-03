
    <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 border">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gross Product</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SHIF</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Housing Levy</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PAYE</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Net Product</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Download Payslip</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ optional($product->user)->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->amount, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->gross_product, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->shif, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->housing_levy, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->paye, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->net_product, 2) }}</td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('user.payslips.download', $product->id) }}"
                        class="text-blue-600 hover:underline"
                        target="_blank">
                        Download
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="px-6 py-4 text-center text-gray-500">No product records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

