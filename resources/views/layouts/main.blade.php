<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	{{-- CSS --}}
	@include('partials.styles')

</head>
<body>
	<header id="header" class="">
		@include('partials.header')
	</header>

	<main>
		@include('partials.messages')
		@yield('content')
	</main>
	
	<footer>
		{{-- @include('partials.footer') --}}
	</footer>
	
	{{-- JS --}}
	@include('partials.scripts')
</body>
</html>