@extends('layouts.master')
@section('content')
		<div class="register z-depth-1">
			<div class="page-header">
				<h1>REGISTER</h1>
			</div>
			<div class="row">
				<form class="col s12" method="post" action="{{ URL::route('postRegister') }}">
					<div class="row">
						{!! Form::token() !!}
						<div class="input-field col s12">
							<input name="name" id="name" type="text" class="validate">
							<label for="name">Last name</label><br>
						</div><br>
						@if ($errors->has('name'))
				            {{ $errors->first('name') }}
					    @endif
						<div class="input-field col s12">
							<input id="firstname" name="firstname" type="text" class="validate">
							<label for="firstname">First name</label><br>
						</div><br>
						<div class="input-field col s12">
							<input id="email" name="email" type="email" class="validate">
							<label for="email">Email</label><br>
							@if ($errors->has('email'))
							<div class="alert alert-error">
						    {{ $errors->first('email') }}
						</div><br>
						@endif
						<div class="input-field col s12">
							<input id="password" type="password" name="password" class="validate">
							<label for="password">Password</label><br>
							@if ($errors->has('password'))
		                    <div class="alert alert-error">
		                    {{ $errors->first('password') }}
	                    </div>
	                    @endif
				</form><br>
				<div class="container-button">
					<a href="{{ URL::to('/') }}" class="button-cancel waves-effect waves-light btn"><i class="material-icons left">clear</i>CANCEL</a>
					<button type="submit" class="button-validate waves-effect waves-light btn"><i class="material-icons left">done</i>CREATE</a>
				</div>
			</div>
		</div>
@stop
