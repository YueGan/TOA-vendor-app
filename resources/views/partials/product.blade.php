<div class="well">
	<h3><a href="/products/{{ $product->id }}">{{ $product->name_zh }}</a></h3>
	<span>{{ $product->name_en }}</span>
	<p>{{ "$" . number_format($product->price, 2, ".", "") }}</p>
</div>