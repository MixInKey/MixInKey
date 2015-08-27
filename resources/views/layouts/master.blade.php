<!DOCTYPE html>
<html lang="en" ng-app="beatportApp">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Music World</title>

	<!-- css -->
	<link href="{{ URL::to('css/material-design.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.indigo-pink.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- css for this project -->
	<link href="{{ URL::to('css/styles.css') }}" rel="stylesheet">

	<!-- favicon -->
	<!-- ... -->

	<!-- ie -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<!-- Loader -->
<body class="avoid-fout" ng-controller="MainController">
	<div class="avoid-fout-indicator avoid-fout-indicator-fixed">
		<div class="progress-circular progress-circular-alt progress-circular-center">
			<div class="progress-circular-wrapper">
				<div class="progress-circular-inner">
					<div class="progress-circular-left">
						<div class="progress-circular-spinner"></div>
					</div>
					<div class="progress-circular-gap"></div>
					<div class="progress-circular-right">
						<div class="progress-circular-spinner"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Menu -->
	<header class="header header-transparent header-waterfall">
		<ul class="nav nav-list pull-left">
			<li>
				<a data-toggle="menu" href="#menu">
					<span class="icon icon-lg">menu</span>
				</a>
			</li>
		</ul>
		<a class="header-logo margin-left-no" data-toggle="menu" href="#menu">
			<img src="{{ URL::to('images/logo/logo.png') }}"></img>
		</a>
		<!-- Page indicator -->
		<div class="header-affix pull-left" data-offset-top="108" data-spy="affix">
			<span class="header-text margin-left-no">
				<i class="icon margin-right">chevron_right</i>Home
			</span>
		</div>
		<!-- Right menu profile -->
		<ul class="nav nav-list pull-right">
			<li>
				<a data-toggle="menu" href="#profile">
					<span class="access-hide">Sylvain Martin</span>
					<span class="avatar"><img src="{{ URL::to('images/users/avatar-001.jpg') }}"></span>
				</a>
			</li>
		</ul>
	</header>
	<!-- Left menu -->
	<nav aria-hidden="true" class="menu" id="menu" tabindex="-1">
		<div class="menu-scroll">
			<div class="menu-content">

				<!-- Search bar -->
				<div class="media menu-logo">
					<div class="media-object pull-left">
						<label class="form-icon-label" for="input-search"><span class="icon">search</span></label>
					</div>
					<div class="media-inner">
						<input class="form-control" id="input-search" placeholder="RECHERCHE" type="text">
					</div>
				</div>

				<ul class="nav">
					<li>
						<a class="waves-attach" href="/"><span class="icon icon-lg">home</span>Home</a>
					</li>
					<li>
						<a class="waves-attach" href="/search"><span class="icon icon-lg">youtube_searched_for</span>Recherche Avancée</a>
					</li>
			</div>
		</div>
	</nav>
	<!-- Right menu -->
	<nav aria-hidden="true" class="menu menu-right" id="profile" tabindex="-1">
		<div class="menu-scroll">
			<div class="menu-top">
				<div class="menu-top-info">
					<a class="menu-top-user" href="javascript:void(0)"><span class="avatar pull-left"><img src="{{ URL::to('images/users/avatar-001.jpg') }}"></span>Sylvain Martin</a>
				</div>
				<div class="menu-top-info-sub">
					<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
				</div>
			</div>
			<div class="menu-content">
				<ul class="nav">
					<li>
						<a class="waves-attach" href="javascript:void(0)"><span class="icon icon-lg">account_box</span>Compte</a>
					</li>
					<li>
						<a class="waves-attach" href="javascript:void(0)"><span class="icon icon-lg">shopping_cart</span>Mon panier</a>
					</li>
					<li>
						<a class="waves-attach menu-collapse collapsed" data-target="#playlist" data-toggle="collapse" href="javascript:void(0)"><span class="icon icon-lg">library_add</span>Playlists</a>
						<span class="menu-collapse-toggle collapsed" data-target="#playlist" data-toggle="collapse"><i class="icon menu-collapse-toggle-close">close</i><i class="icon menu-collapse-toggle-default">add</i></span>
						<ul class="menu-collapse collapse" id="playlist">
							<li>
								<a class="waves-attach" href="#"><span class="icon icon-lg">add</span>Créer une playlist</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="waves-attach" href="javascript:void(0)"><span class="icon icon-lg">settings</span>Paramètres</a>
					</li>
					<li>
						<a class="waves-attach" href="/login"><span class="icon icon-lg">exit_to_app</span>Déconnexion</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

      @yield('content')
			<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<p>©Copyright</p>
			</div>
		</footer>
		<!-- Player button -->
		<div class="fbtn-container">
			<div class="fbtn-inner">
				<a class="fbtn fbtn-green fbtn-lg" data-toggle="dropdown"><span class="fbtn-text">Player</span><span class="fbtn-ori icon">add</span><span class="fbtn-sub icon">close</span></a>
				<div class="fbtn-dropdown">
					<a class="fbtn" target="_blank"><span class="fbtn-text">Back</span><span class="fa fa-step-backward"></span></a>
					<a class="fbtn" target="_blank"><span class="fbtn-text">Play</span><span class="fa fa-play"></span></a>
					<a class="fbtn" target="_blank"><span class="fbtn-text">Pause</span><span class="fa fa-pause"></span></a>
					<a class="fbtn" target="_blank"><span class="fbtn-text">Next</span><span class="fa fa-step-forward"></span></a>
				</div>
			</div>
		</div>

		<!-- js -->

		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="{{ URL::to('js/material-design.js') }}"></script>
		<script src="{{ URL::to('js/static/bower_components/angularjs/angular.min.js') }}"></script>
		<script src="{{ URL::to('js/controllers/MainCtrl.js') }}"></script>
		<script src="{{ URL::to('js/services/beatportService.js') }}"></script>

		<!-- js for this project -->
		<script src="{{ URL::to('js/script.js') }}"></script>
	</body>
	</html>
