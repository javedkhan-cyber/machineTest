
{{-- I have just show how to show data here --}}
@forelse($getOrders as $order)

{{ $order->productDetails->name}}
{{ $order->status == 1 ? 'Success':'Pending'}}



@empty
@endforelse