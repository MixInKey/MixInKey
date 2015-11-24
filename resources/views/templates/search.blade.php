@extends('layouts.master')

@section('content')
<div class="container">
		<div class="main z-depth-2">
			<div class="page-header">
				<h1>Recherche Avancée</h1>
			</div><br>

			 <div class="container">
				 <div class="form-group form-group-label" ng-init="findGenres()">
           <label for="genre">Genre</label>
           <select class="form-control" id="genre" ng-model="query.genre">
               <option value="<% genre.id %>" ng-repeat="genre in genres"><% genre.name %></option>
           </select>
         </div>

				<div class="form-group">
					<p class="range-field">
			      <input type="range" min="0" max="100" />
			    </p>
				</div>

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
					<div class="col-md-6" ng-repeat="track in tracks.results">
							<a id="<% track.id %>" href="#<% track.id %>" ng-click="changeTrack(track.id)"><% track.id %> <% track.name %></a>
							<img class="thumbnail" ng-src="<% track.images.medium.url %>">
					</div>
			    <div class="button-search bot-space">
				    <a ng-click="request('genre')" class="waves-effect waves-light btn"><i class="material-icons left">search</i>Rechercher</a>
			    </div>
			 </div>
		</div>
	</div>
@stop
