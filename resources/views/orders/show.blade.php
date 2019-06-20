@extends('layouts.main')

@section('content')
<div class="container">
	<div class="product-show-button" style="">
		<div style="display:inline-block;">
			<a href="/products" class="btn btn-secondary">Go Back</a>	
		</div>
		@auth
			<div style="display:inline-block;">
				<a href="/products/{{ $product->id }}/edit" class="btn btn-primary">Edit</a>
			</div>
			<div style="display:inline-block;">
				{{ Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'pull-right']) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit("Delete", ['class' => 'btn btn-danger']) }}
				{{ Form::close() }}
			</div>
		@endauth
		@guest
			<div>View</div>
		@endguest
	</div>
	
	<div class="card card-body bg-light mt-3">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<img style="width:100%" src="/storage/cover_images/{{ $product->cover_image }}" alt="">
			</div>	
			<div class="col-md-8 col-sm-8">
				<h3>{{ $product->name_zh }}</a></h3>
				<span>{{ $product->name_en }}</span>
				<p>{{ "$" . number_format($product->price, 2, ".", "") }}</p>	
			</div>	
		</div>
	</div>
</div>

@endsection 
@push('styles')
<style>
	.product-show-button{
		width:100%;
		margin: 10px 0px 10px 0px;
	}	
</style>
@endpush