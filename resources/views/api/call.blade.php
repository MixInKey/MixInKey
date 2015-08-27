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
			<div class="col-md-6" ng-repeat="track in tracks.results">
					<p><% track.id %></p>
					<img class="thumbnail" src="<% track.images.large.url %>">
			</div>
		</div>
		<iframe src='https://embed-www.beatport.com/s/uykuzpdtjo4s' width='100%' height='166' scrolling='no' frameborder='0'></iframe>
</div>
{{-- <iframe src='http://embed.beatport.com/player/?id=5500589&type=track' width='100%' height='166' scrolling='no' frameborder='0'></iframe> --}}
@stop
