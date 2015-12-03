@extends('layouts.master')
@section('content')
<div class="register z-depth-1">
	<div class="page-header">
		<h1>CREATE AN ACCOUNT</h1>
	</div>
	<div class="row">
		<form class="col s12" method="post" action="{{ URL::route('postRegister') }}">
			<div class="row">
				{!! Form::token() !!}
				<div class="input-field col s12">
					<input type="text" name="firstname-chrome" hidden>
					<input id="firstname" name="firstname" type="text" class="validate">
					<label for="firstname">First name</label><br>
				</div><br>
				@if ($errors->has('name'))
				{{ $errors->first('name') }}
				@endif
				<div class="input-field col s12">
				<input type="text" name="name-chrome" hidden>
					<input name="name" id="name" type="text" class="validate">
					<label for="name">Last name</label><br>
				</div><br>
				<div class="input-field col s12">
					<input type="email" name="chrome-fill-mail" hidden>
					<input id="email" name="email" type="email" class="validate">
					<label for="email">Email</label><br>
					@if ($errors->has('email'))
					<div class="alert alert-error">
						{{ $errors->first('email') }}
					</div><br>
				</div>
				@endif
				<div class="input-field col s12">
					<input type="password" name="chrome-fill-pwd" hidden>
					<input id="password" type="password" name="password" class="validate">
					<label for="password">Password</label><br>
					@if ($errors->has('password'))
					<div class="alert alert-error">
						{{ $errors->first('password') }}
					</div>
					@endif
				</div>
			</div><br>
			<div class="button-connexion top-space">
				<button type="submit" id="signin-btn" class="waves-effect waves-light btn">Sign up</button>
			</div>
			</form>
			<div class="button-register top-space">
				<p>Already have an account ?</p>
				<a target="_self" href="{{ URL::to('signin') }}" class="waves-effect waves-light btn">Sign in</a>
			</div>
		</div>
	</div>
@stop
