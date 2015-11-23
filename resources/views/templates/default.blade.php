<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Connexion - Music World</title>

	<!-- css -->
	<link href="../css/material-design.min.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">

	<!-- css for this project -->
	<style type="text/css">
		body {
			padding-top: 56px;
			padding-bottom: 69px;
			background-color: #263238;
		}
	</style>

	<!-- favicon -->
	<!-- ... -->

	<!-- ie -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body class="avoid-fout">
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
	<header class="header header-waterfall">
		<span class="header-logo">
			<img src="../images/logo/logo.png"></img>
		</span>
	</header>
	<div class="content">
		<div class="container">
			@if(Session::has('error'))
					<div class="alert alert-danger">
						{{ Session::get('error') }}
					</div>
			@elseif(Session::has('success'))
					<div class="alert alert-success">
							{{ Session::get('success') }}
					</div>
			@endif
      @yield('content')
    </div>
	</div>
	<footer class="footer">
		<div class="container">
			<p>©Copyright</p>
		</div>
	</footer>

	<!-- js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/material-design.min.js"></script>

	<!-- js for this project -->
	<script src="../js/script.js"></script>
</body>
</html>
