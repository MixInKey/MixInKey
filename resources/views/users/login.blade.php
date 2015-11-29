@extends('layouts.master')
@section('content')
<base href="/" />
<div class="login z-depth-1">
	<div class="page-header">
		<h1>authentication</h1>
	</div>
	<div class="row">
		<form class="col s12" method="post" action="{{ URL::route('postLogin') }}">
			<div class="row">
				{!! Form::token() !!}
				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
					<input type="email" hidden>
					<input id="email" name="email" type="text" autocomplete="false" class="validate">
					<label for="email">Email</label><br>
				</div><br>
				@if ($errors->has('email'))
					<p>{{ $errors->first('email') }}</p>
				@endif
				<div class="input-field col s12">
					<i class="material-icons prefix">lock</i>
					<input type="password" hidden />
					<input id="password" type="password" name="password" autocomplete="false" class="validate">
					<label for="password">Password</label><br>
				</div>
				@if ($errors->has('password'))
					<p>{{ $errors->first('password') }}</p>
				@endif
			</div>
			<div class="button-connexion top-space">
				<button type="submit" class="waves-effect waves-light btn">Sign in</button>
			</div>
			<div class="button-register top-space">
				<p>Don't have an account yet ?</p>
				<a href="{{ URL::to('signup') }}" class="waves-effect waves-light btn">Sign up</a>
			</div>
		</form>
	</div>
</div>
@stop
