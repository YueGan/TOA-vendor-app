@extends('layouts.main')

@section('content')
<div class="container">
	<a href="/products" class="btn btn-default">Go Back</a>
	<h1>Create Product</h1>
	{{ Form::open(['action' => 'ProductsController@store', 'method' => "POST", 'enctype' => 'multipart/form-data']) }}
		<div class="form-group">
			{{ Form::label('name_zh', "中文名") }}
			{{ Form::text('name_zh', '', ['class' => 'form-control', 'placeholder' => '中文名'])}}
		</div>
		<div class="form-group">
			{{ Form::label('name_en', "英文名") }}
			{{ Form::text('name_en', '', ['class' => 'form-control', 'placeholder' => '英文名'])}}
		</div>
		<div class="form-group">
			{{ Form::label('price', "价格") }}
			{{ Form::text('price', '', ['class' => 'form-control', 'placeholder' => '价格'])}}
		</div>
		<div class="form-group">
			{{ Form::file('cover_image') }}
		</div>
		{{ Form::submit('Submit', ['class' => 'btn btn-primary ']) }}
	{{ Form::close() }}
</div>
@endsection 