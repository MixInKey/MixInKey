@extends('layouts.master')

@section('content')
<<<<<<< HEAD
<div class="main z-depth-1">
	<div class="page-header">
		<h1>Advanced Search</h1>
	</div><br>

	<div class="container">
		<div class="form-group form-group-label" ng-init="findGenres()">
			<label for="genre">Genres</label>
			<select class="form-control" id="genre">
				<option ng-repeat="genre in genres"><% genre.name %></option>
			</select>
		</div><br>
=======
	<base href="/search/">
	<div class="container">
		<div class="main z-depth-2">
			<div class="page-header">
				<h1>Recherche Avancée</h1>
			</div><br>

			 <div class="container">
				 <div class="form-group form-group-label" ng-init="findGenres()">
           <label for="genre">Genre</label>
           <select class="form-control" id="genre">
               <option ng-repeat="genre in genres"><% genre.name %></option>
           </select>
	 	</div>
>>>>>>> routing

		<div class="form-group">
			<label for="range">BPM</label>
			<p class="range-field">
				<input type="range" min="0" max="100" />
			</p>
		</div><br>

		<form class="row chekbox">
			<div class="col s3">
				<input type="checkbox" class="filled-in" id="option1" checked="checked" />
				<label for="option1">Option 1</label>
			</div>
			<div class="col s3">
				<input type="checkbox" class="filled-in" id="option2" checked="checked" />
				<label for="option2">Option 2</label>
			</div>
			<div class="col s3">
				<input type="checkbox" class="filled-in" id="option3" checked="checked" />
				<label for="option3">Option 3</label>
			</div>
			<div class="col s3">
				<input type="checkbox" class="filled-in" id="option4" checked="checked" />
				<label for="option4">Option 4</label>
			</div>
		</form><br>

<<<<<<< HEAD
		<div class="button-search bot-space">
			<a class="waves-effect waves-light btn"><i class="material-icons left">search</i>Search</a>
=======
			    <div class="button-search bot-space">
				    <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">search</i>Rechercher</button>
			    </div>

			 	<div ng-view></div>

			 </div>
>>>>>>> routing
		</div>
	</div>
</div>
@stop
