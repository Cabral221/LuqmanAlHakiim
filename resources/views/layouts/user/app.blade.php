<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('layouts.user.google-analytics')

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="title" content="Daara Luqman Al Hakiim">
	<meta name="description" content="Le Daara Luqman Al Hakiim, en plus d'être spécialisé dans l'enseignement du Coran et des sciences religieuse , est un institut de formation enseignement basé sur le programme officiel d'enseignement général">
	<meta name="keywords" content="internat, daara, daara luqman, luqman, luqman al hakiim, école, coran, islam, school, cours, université, session, classe">
	
	<title>{{ page_title($title ?? '') }}</title>
	
	<!-- Styles -->
	@include('layouts.user.style')
	@mapstyles
	@yield('css')
</head>
<body>
	<div id="app">
		{{-- Refactor loader for waiting page --}}
		{{-- <div class="preloader">
			<div class="preloader-img">
				<span class="loading-animation animate-flicker"><img src="{{ asset('assets/img/loading.GIF') }}" alt="loading"/></span>
			</div>
		</div> --}}
		@include('layouts.user.header')
		
		@yield('text-header')
		
		@yield('content')
		
		@include('layouts.user.footer')
		
		@include('layouts.user.script')
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins.js') }}"></script>
	{{-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> --}}
	<script src="{{ asset('assets/js/init.js') }}"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
		
	
	@yield('js')
	@include('flashy::message')
	@mapscripts
</body>
</html>