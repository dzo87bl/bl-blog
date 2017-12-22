<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('partials._head')
	</head>
	<body>
		<div id="app">
			@include('partials._msg')
			@include('partials._header')
			@include('partials._nav')
			<!-- content -->
			@yield('content')
			<!-- / content -->
			@include('partials._footer')
		</div>
		<a href="#" class="scrollup">Scroll</a>
		<!-- SCRIPTS -->
		<script language="javascript" src="{{ asset('js/main.js') }}"></script>
		{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
		<script language="javascript">
			$(document).ready(function(){
				
			});
		</script>
	</body>
</html>
