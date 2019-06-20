<div class="card card-body bg-light mt-3">
	<div class="row">
		<div class="col-md-4 col-sm-4">
			<img style="width:30px" src="/storage/cover_images/{{ $product->cover_image }}" alt="">
		</div>	
		<div class="col-md-8 col-sm-8">
			<h3><a href="/products/{{ $product->id }}">{{ $product->name_zh }}</a></h3>
			<span>{{ $product->name_en }}</span>
			<p>{{ "$" . number_format($product->price, 2, ".", "") }}</p>
		</div>
	</div>
</div>

