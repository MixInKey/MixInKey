@extends('layouts.master')
@section('content')
		<div class="login z-depth-1">
			<div class="page-header">
				<h1>Connexion</h1>
			</div>
			<div class="row">
				<form class="col s12" method="post" action="{{ URL::route('postLogin') }}">
					<div class="row">
						{!! Form::token() !!}
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input type="email" hidden>
							<input id="email" type="text" autocomplete="false" class="validate">
							<label for="email">Email</label><br>
						</div><br>
						@if ($errors->has('email'))
					    	{{ $errors->first('email') }}
						@endif
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input type="password" hidden />
							<input id="password" type="password" autocomplete="false" class="validate">
							<label for="password">Password</label><br>
						</div>
						@if ($errors->has('password'))
							 <br>{{ $errors->first('password') }}
						@endif
					</div>
				<div class="button-connexion top-space">
					<button type="submit" class="waves-effect waves-light btn"><i class="material-icons right">send</i>CONNEXION</button>
				</div>
				<div class="button-register top-space">
					<a href="{{ URL::to('register') }}" class="waves-effect waves-light btn">REGISTER</a>
				</div>
				</form>
			</div>
		</div>
@stop
