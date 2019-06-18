@extends('layouts.main')

@section('content')
<div class="container">
	<h1>Products</h1>
	<a href="/products/create" class="btn btn-primary">添加商品</a>
	@if(count($products) > 0)
		@each('partials.product', $products, 'product')
		{{ $products->links() }}
	@else
		<p>No product found</p>
	@endif
</div>
@endsection