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
				</form><br>
				<div class="container-button">
					<a href="{{ URL::to('login') }}"class="button-cancel waves-effect waves-light btn"><i class="material-icons left">clear</i>ANNULER</a>
					<a type="submit" class="button-validate waves-effect waves-light btn"><i class="material-icons left">done</i>VALIDER</a>
				</div>
			</div>
		</div>
	</div>
@stop
