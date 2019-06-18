@extends('layouts.main')

@section('content')
<div class="container">
	<a href="/products" class="btn btn-default">Go Back</a>
	<h3>{{ $product->name_zh }}</a></h3>
	<span>{{ $product->name_en }}</span>
	<p>{{ "$" . number_format($product->price, 2, ".", "") }}</p>
	<a href="/products/{{ $product->id }}/edit" class="btn btn-default">Edit</a>

	{{ Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'pull-right']) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::submit("Delete", ['class' => 'btn btn-danger']) }}
	{{ Form::close() }}
</div>
@endsection 