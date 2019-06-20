<div class="card card-body bg-light mt-3">
	<h3>Order Id: {{ $order->id }}</h3>
	<span>Status: {{ $order->status }}</span>
	<p>Total: {{ "$" . number_format($order->total, 2, ".", "") }}</p>
	@foreach($order->products as $product)
		<h3>{{ $product->name_zh }}</h3>
		<span>{{ $product->name_en }}</span>
		<p>Amount: {{ $product->pivot->amount }}</p>
	@endforeach
</div>