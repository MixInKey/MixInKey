@extends('layouts.master')

@section('content')
<div class="content" ng-init="findTracks()">
	<div class="content-heading">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-push-3 col-sm-10 col-sm-push-1">
						<h1 class="heading hidden-xs hidden-xx">Test API</h1>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="input-group">
					<input type="text" class="form-control" ng-model="query.name" placeholder="Search .."><br><br>
			</div>
			<div class="col-md-6" ng-repeat="track in tracks.results | filter: query">
					<a id="<% track.id %>" href="#<% track.id %>" ng-click="main.changeTrack(track.id)"><% track.id %> <% track.name %></a>
					<img class="thumbnail" ng-src="<% track.images.medium.url %>">
			</div>

			<iframe ng-src="<% main.currentPlayer %>" id="playerFrame" width='400px' height='166' scrolling='no' frameborder='0'></iframe>
		</div>
		<ul ng-repeat="artist in artists">
				<li ><% artist.name %> <% artiste.id %></li>
		</div>
</div>
@stop
