@extends('layouts.main')

@section('content')
<div class="container">
	<h1>Create Order</h1>
	{{ Form::open(['action' => 'OrdersController@store', 'method' => "POST", 'enctype' => 'multipart/form-data']) }}

		<div class="form-group">
			{{ Form::label('comment', "comment") }}
			{{ Form::text('comment', '', ['class' => 'form-control', 'placeholder' => '备注'])}}
			{{ Form::checkbox('asap',null,null, array('id'=>'asap')) }}
		</div>
		{{ Form::submit('Submit', ['class' => 'btn btn-primary ']) }}
	{{ Form::close() }}
</div>
@endsection 