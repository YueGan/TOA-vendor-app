@extends('layouts.main')
@section('content')
	<div class="container">
	@if(count($products) > 0)
		@each('partials.product', $products, 'product')
	@else
		<p>No product found</p>
	@endif
	</div>
@endsection

{{-- @push('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@endpush --}}