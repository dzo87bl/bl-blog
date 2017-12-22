		<!-- META -->
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript"/>
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content=""/>
		<meta name="copyright" content=""/>
		<meta name="generator" content=""/>
		<meta name="distribution" content=""/>
		<meta name="date" content=""/>
		<!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- SCRIPTS -->
		<script src="{{ asset('js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
		<!-- STYLE -->
    	{{-- <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet"> --}}
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
		<title>{{ config('app.name', 'BL-Blog') }}</title>
		<!-- LINK -->
		<link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>
		<!-- PLUGINS -->
		<script src="{{ asset('plugins/smooth-page-scroll-to-top/smooth_scroll.js') }}" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/smooth-page-scroll-to-top/smooth_scroll.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/animate/animate.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/hover/hover.css') }}"/>
		<script src="{{ asset('plugins/pace/pace.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/smooth-mouse-scrolling-scrollspeed/jQuery.scrollSpeed.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/parsley/parsley.min.js') }}" type="text/javascript"></script>
		<link href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}" media="all" rel="stylesheet" type="text/css" />
		<script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
		<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
		<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
		<link href="{{ asset('plugins/bootstrap-star-rating/css/star-rating.min.css') }}" media="all" rel="stylesheet" type="text/css" />
		<script src="{{ asset('plugins/bootstrap-star-rating/js/star-rating.min.js') }}" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css') }}"/>
		<script src="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.js') }}" type="text/javascript"></script>
		<link href="{{ asset('plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') }}" media="all" rel="stylesheet" type="text/css" />
		<script src="{{ asset('plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') }}" type="text/javascript"></script>
		<link href="{{ asset('plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css') }}" media="all" rel="stylesheet" type="text/css" />
		<script src="{{ asset('plugins/bootstrap-slider/dist/bootstrap-slider.min.js') }}" type="text/javascript"></script>
		<!-- GOOGLE -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://unpkg.com/vue"></script>