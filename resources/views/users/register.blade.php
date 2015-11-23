@extends('layouts.master')
@section('content')
<div class="container">
		<div class="register z-depth-2">
			<div class="page-header">
				<h1>Inscription</h1> 
			</div>
			<div class="row">
				<form class="col s12" method="post" action="{{ URL::route('postRegister') }}">
					<div class="row">
						{!! Form::token() !!}
						<div class="input-field col s12">
							<input id="nom" type="text" class="validate">
							<label for="nom">Nom</label><br>
						</div><br>
						@if ($errors->has('name'))
				            {{ $errors->first('name') }}
					    @endif
						<div class="input-field col s12">
							<input id="prenom" type="text" class="validate">
							<label for="prenom">Prénom</label><br>
						</div><br>
						<div class="input-field col s12">
							<input id="email" type="email" class="validate">
							<label for="email">Email</label><br>
							@if ($errors->has('email'))
							<div class="alert alert-error">
						    {{ $errors->first('email') }}
						</div><br>
						@endif
						<div class="input-field col s12">
							<input id="password" type="password" class="validate">
							<label for="password">Mot de passe</label><br>
							@if ($errors->has('password'))
		                      <div class="alert alert-error">
		                    {{ $errors->first('password') }}
	                    </div>
	                    @endif
						</div>
					</div>
				</form><br>
				<div class="container">
					<a type="submit" class="button-validate waves-effect waves-light btn"><i class="material-icons left">done</i>VALIDER</a>
					<a class="button-cancel waves-effect waves-light btn"><i class="material-icons left">clear</i>ANNULER</a>
				</div>
			</div>
		</div>
	</div>

<div class="row">
	<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
		<section class="content-inner">
			<div class="card-wrap">
				<div class="card-login">
					<div class="card-main">
						<div class="card-header">
							<div class="card-inner">
								<h1 class="card-heading">Register</h1>
							</div>
						</div>
						<div class="card-inner">
							<p class="text-center">
								<span class="avatar avatar-inline avatar-lg">
									<img alt="Login" src="../images/users/avatar-001.jpg">
								</span>
							</p>
							<form class="form" method="post" action="{{ URL::route('postRegister') }}">
								{!! Form::token() !!}
								<div class="form-group form-group-label">
									<div class="row">
										<div class="col-md-10 col-md-push-1">
											<label class="floating-label" for="login-name">Username</label>
											<input type="text" class="form-control" name="name" id="name" placeholder="Enter Username">
											@if ($errors->has('name'))
				                {{ $errors->first('name') }}
					            @endif
										</div>
									</div>
								</div>
								<div class="form-group form-group-label">
									<div class="row">
										<div class="col-md-10 col-md-push-1">
											<label class="floating-label" for="login-name">Email</label>
											<input type="text" class="form-control" name="email" id="email" placeholder="Your email">
											@if ($errors->has('email'))
                        <div class="alert alert-error">
						                {{ $errors->first('email') }}
                        </div>
							            @endif
										</div>
									</div>
								</div>
								<div class="form-group form-group-label">
									<div class="row">
										<div class="col-md-10 col-md-push-1">
											<label class="floating-label" for="login-password">Mot de passe</label>
											<input type="password" class="form-control" name="password" id="password" placeholder="Choose password">
										</div>
                    @if ($errors->has('password'))
                      <div class="alert alert-error">
                        {{ $errors->first('password') }}
                      </div>
                    @endif
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-10 col-md-push-1">
											<button type="submit" class="btn btn-block waves-attach waves-button">Submit</button>
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
@stop
