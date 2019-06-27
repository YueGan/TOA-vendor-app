@extends('layouts.main')

@section('content')
<div class="container">
	<h1 class="display-5">创建订单</h1>
	<form action="{{ route('orders.store') }}" method="POST" accept-charset="utf-8">
		{{ csrf_field() }}
		
		@foreach($products as $product)	
		<div class="row">
			{{-- <div class="col-sm-6"> --}}
				<div class="card card-body bg-light mt-2">
					<div class="form-group">
						<img name="{{ $product->id }}" src="/storage/icons/minus.svg" id="down" href="#" onclick="updateSpinner(this);" style="width:30px" data-price="{{ $product->price }}"></img>
						<input name="{{ $product->id }}" id="{{ "content" . $product->id }}" value=0 type="text" style="width:30px" data-price="{{ $product->price }}"/>
						<img name="{{ $product->id }}" src="/storage/icons/add.svg" id="up" href="#" onclick="updateSpinner(this);" style="width:30px" data-price="{{ $product->price }}"></img>
							<label>{{ $product->name_zh }}</label>	
							<label>{{ $product->name_en }}</label>	
							<label>$ {{ $product->price }}</label>	
					</div>	
				</div>
			{{-- </div> --}}
		</div>
		@endforeach

		<div class="form-group">
			<label>Total</label>
			
			$ <output id="result">0</output>	
		</div>
		<button class="btn btn-primary"> Submit </button>
	</form>
</div>
	@endsection
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script>
		$('#result').val(0);
		function updateSpinner(obj)
		{
			var contentObj = document.getElementById("content" + obj.name);
			var value = parseInt(contentObj.value);
			var price = $("#content" + obj.name).data('price');
			var total = $('#result').val();
			if(obj.id == "down") {
				if(value > 0)
					var tmp = parseFloat(total) - parseFloat(price);
				else
					tmp = parseFloat(total)
				value = Math.max(value-1, 0);
				$('#result').val(tmp.toFixed(2));
			} else {
				value++;
				var tmp = parseFloat(total) + parseFloat(price);
				$('#result').val(tmp.toFixed(2));
			}
			contentObj.value = value; 
		}

	</script>