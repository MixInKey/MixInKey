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
			<div class="row">
				<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
					<section class="content-inner">
						<div class="card-wrap">
							<div class="card-login">
								<div class="card-main">
									<div class="card-header">
										<div class="card-inner">
											<h1 class="card-heading">Connexion</h1>
										</div>
									</div>
									<div class="card-inner">
										<p class="text-center">
											<span class="avatar avatar-inline avatar-lg">
												<img alt="Login" src="../images/users/avatar-001.jpg">
											</span>
										</p>
										<form class="form" action="/">
											<div class="form-group form-group-label">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<label class="floating-label" for="login-username">Utilisateur</label>
														<input class="form-control" id="login-username" type="text">
													</div>
												</div>
											</div>
											<div class="form-group form-group-label">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<label class="floating-label" for="login-password">Mot de passe</label>
														<input class="form-control" id="login-password" type="password">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<button class="btn btn-block waves-attach waves-button">Connexion</button>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<div class="checkbox checkbox-adv">
															<label for="login-remember">
																<input class="access-hide" id="login-remember" name="login-remember" type="checkbox">Rester connecté
																<span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix">
							<p class="margin-no-top pull-left"><a class="btn btn-flat btn-blue waves-attach" href="javascript:void(0)">Besoin d'aide ?</a></p>
							<p class="margin-no-top pull-right"><a class="btn btn-flat btn-blue waves-attach" href="javascript:void(0)">Créer un compte</a></p>
						</div>
					</section>
				</div>
			</div>
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
	<script src="../js/project.js"></script>
</body>
</html>
