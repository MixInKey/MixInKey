<!DOCTYPE html>
<html lang="en" ng-app="beatportApp">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>MixInKey</title>
	<link rel="icon" href="{{ URL::to('favicon.ico') }}" />

	<!-- css -->
	<link href="/css/static/material-icons.css" rel="stylesheet">
	<link href="/css/static/materialize/css/materialize.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link href="/css/static/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{ URL::to('css/styles.css') }}" rel="stylesheet">
	<link href="{{ URL::to('css/player.css') }}" rel="stylesheet">

	{{--  js (must be loaded here) --}}
	<script src="{{ URL::to('js/static/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ URL::to('js/static/materialize.js') }}"></script>
	<script src="{{ URL::to('js/static/jquery-ui.min.js') }}"></script>

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="avoid-fout" ng-controller="MainController as main">
	<!-- Menu -->
	<header>
		<ul id="dropdown1" class="dropdown-content">
		  <li>
		  	<a href="#"><i class="material-icons left">list</i>Playlist</a>
		  </li>
		  <li>
		  	<a href="#"><i class="material-icons left">settings</i>Settings</a>
		  </li>
		  <li>
		  	<a href="{{ URL::to('signout') }}" target="_self"><i class="material-icons left">exit_to_app</i>Sign out</a>
		  </li>
		</ul>

		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper">
					<a href="/" class="brand-logo">
						<img src="{{ URL::to('images/logo/logo100x100.png') }}"></a>
					</a>
					@if(Auth::check())
					<span class="input-field hidden-search inner-addon left-addon">
						<i class="material-icons prefix">search</i>
						<input id="search" type="text" placeholder="Search" class="validate">
					</span>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li>
							<a href="/" target="_self"><i class="material-icons left">home</i>Home</a>
						</li>
						<li>
							<a class="dropdown-button" href="/" data-activates="dropdown1"><i class="material-icons left">account_box</i>Profile<i class="material-icons right">arrow_drop_down</i></a>
						</li>
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li class="input-field">
								<i class="material-icons prefix">search</i>
								<input id="search-mobile" type="text" placeholder="Search" class="validate">
						</li>
						<li>
							<a href="/" target="_self"><i class="material-icons left">home</i>Home</a>
						</li>
						<ul class="collapsible" data-collapsible="expandable">
							<li>
								<div class="collapsible-header"><i class="material-icons left">account_box</i>Profile<i class="material-icons right">arrow_drop_down</i></div>
								<div class="collapsible-body">
									<p>
										<a href="/"><i class="material-icons left">list</i>Playlist</a>
										<a href="/"><i class="material-icons left">settings</i>Settings</a>
										<a href="{{ URL::to('signout') }}" target="_self"><i class="material-icons left">exit_to_app</i>Sign out</a>
									</p>
								</div>
							</li>
						</ul>
					</ul>
					@endif
				</div>
			</nav>
		</div>
	</header>

	<main>
		<div class="container">
			@yield('content')
		</div>
	</main>

	<footer class="page-footer">
		<div class="footer-copyright">
			<div class="container">
				© 2015 MixInKey
			</div>
		</div>
	</footer>

	{{-- Session --}}
	@if(Session::has('error'))
		<script type="text/javascript">
			Materialize.toast('{{ Session::get('error') }}', 1500)
		</script>
	@elseif(Session::has('success'))
		<script type="text/javascript">
			Materialize.toast('{{ Session::get('success') }}', 1500);
		</script>
	@endif

	<!-- js -->
	<script src="{{ URL::to('js/static/bower_components/angularjs/angular.min.js') }}"></script>
	<script src="{{ URL::to('js/static/bower_components/angular-route/angular-route.min.js') }}"> </script>
	<script type="text/javascript" src="{{ URL::to('/js/dist/app.min.js')}}"></script>
</body>
</html>
