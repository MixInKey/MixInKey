@extends('layouts.master')
@section('content')
	<div class="container">
		<div class="login z-depth-2">
			<div class="page-header">
				<h1>Connexion</h1> 
			</div>
			<div class="row">
				<form class="col s12" method="post" action="{{ URL::route('postLogin') }}">
					<div class="row">
						{!! Form::token() !!}
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="email" type="email" class="validate">
							<label for="email">Email</label><br>
						</div><br>
						@if ($errors->has('name'))
					    	{{ $errors->first('name') }}
						@endif
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input id="password" type="password" class="validate">
							<label for="password">Mot de passe</label><br>
						</div>
					</div>
				</form>

				<div class="button-connexion top-space">
					<a class="waves-effect waves-light btn"><i class="material-icons right">send</i>CONNEXION</a>
				</div>
				<div class="button-register top-space">
					<a href="{{ URL::to('login') }}" class="waves-effect waves-light btn">INSCRIPTION</a>
				</div>
			</div>
		</div>
	</div>
@stop
