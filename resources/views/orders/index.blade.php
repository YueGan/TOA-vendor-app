@extends('layouts.main')

@section('content')
<div class="container">
	<h1>{{ $status }}</h1>
	<div class="row">
		<div class="col-md-4 col-sm-4">
			<a href="/orders" class="btn btn-primary">新订单</a>	
			<a href="/completed" class="btn btn-success">已完成订单</a>	
			<a href="/archived" class="btn btn-danger">已删除订单</a>	
		</div>
	</div>
	
	@if(count($orders) > 0)
		@each('partials.order', $orders, 'order')
		{{ $orders->links() }}
	@else
		<p>No New Order</p>
	@endif
</div>
@endsection