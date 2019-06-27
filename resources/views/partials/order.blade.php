<div class="card card-body bg-light mt-3">
	<h1 class="display-4">Order Id: {{ $order->id }}</h1>
	{{-- <span>Status: {{ $order->status }}</span> --}}
	<p>Total: {{ "$" . number_format($order->total, 2, ".", "") }}</p>
	@foreach($order->products as $product)
		<h3>{{ $product->name_zh }}</h3>
		<span>{{ $product->name_en }}</span>
		<p>Amount: {{ $product->pivot->amount }}</p>
	@endforeach
	@if($order->status != 0)
	<form action="{{ route('orders.toNew', ['id' => $order->id]) }}" method="GET" accept-charset="utf-8">
				{{ csrf_field() }}
	<button class="btn btn-primary"> 变回新订单 </button>
	</form>
	@endif

	@if($order->status != 1)
	<form action="{{ route('orders.toComplete', ['id' => $order->id]) }}" method="GET" accept-charset="utf-8">
				{{ csrf_field() }}
	<button class="btn btn-success">变完成订单</button>
	</form>
	@endif
	@if($order->status != 2)
	<form action="{{ route('orders.toArchive', ['id' => $order->id]) }}" method="GET" accept-charset="utf-8">
				{{ csrf_field() }}
	<button class="btn btn-danger">变删除订单</button>
	</form>
	@endif
</div>