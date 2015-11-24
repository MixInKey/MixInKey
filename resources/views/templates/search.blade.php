@extends('layouts.master')

@section('content')
<div class="main z-depth-1">
	<div class="page-header">
		<h1>Advanced Search</h1>
	</div><br>

	<div class="container">
		<div class="form-group form-group-label" ng-init="main.findGenres()">
			<label for="genre">Genres</label>
			<select class="form-control" id="genre" ng-model="main.query.genre">
				<option value="<% genre.id %>" ng-repeat="genre in main.genres"><% genre.name %></option>
			</select>
		</div><br>

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

		<div class="button-search bot-space">
			<a ng-click="main.search()" class="waves-effect waves-light btn"><i class="material-icons left">search</i>Search</a>
		</div>

		<div ng-if="main.tracks" class="row">
			<div class="col-md-6" ng-repeat="track in main.tracks.results | filter: query">
					<a id="<% track.id %>" href="#<% track.id %>" ng-click="changeTrack(track.id)"><% track.id %> <% track.name %></a>
					<img class="thumbnail" ng-src="<% track.images.medium.url %>">
			</div>
		</div>
	</div>
</div>
@stop
