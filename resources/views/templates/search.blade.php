@extends('layouts.master')

@section('content')
<base href="/search/" />
<div class="search z-depth-1">
	<div class="page-header">
		<h3>Advanced Search</h3>
	</div><br>

	<div class="container">
		<div class="form-group form-group-label" ng-init="main.findGenres()">
			<label for="genre">Genres</label>
			<select class="form-control" id="genre" ng-model="main.query.genre">
				<option value="[% genre.id %]" ng-repeat="genre in main.genres">[% genre.name %]</option>
			</select>
		</div><br>

		<div class="form-group">
			<label for="range">BPM</label>
			<p class="range-field">
				<input type="range" name="range" min="0" max="100" />
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
	</div>
</div>

<div class="result z-depth-1" ng-if="main.tracks.results" >
	<div class="page-header">
		<h3>Result</h3>
	</div><br>

	<div class="container">
		<div class="row">
					<table class="bordered">
					 <thead>
						 <tr>
								 <th class="hidden-mobile" data-field="cover">Cover</th>
								 <th data-field="artist">Artist</th>
								 <th data-field="track">Track</th>
								 <th data-field="genre">Genre</th>
								 <th data-field="key">Key</th>
								 <th data-field="bpm">BPM</th>
								 <th data-field="play">Play</th>
						 </tr>
					 </thead>

					 <tbody ng-repeat="track in main.tracks.results | filter: query">
						 <tr>
							 <td class="hidden-mobile">
								 <img class="thumbnail" ng-src="[% track.images.medium.url %]">
							 </td>
							 <td>
								 Artist
							 </td>
							 <td>
								 [% track.name %]
							 </td>
							 <td>
								 Genre
							 </td>
							 <td>
								 Key
							 </td>
							 <td>
								 BPM
							 </td>
							 <td>
								 <a id="[% track.id %]" ng-click="main.changeTrack(track.id)"><i class="material-icons">play_circle_filled</i></a>
							 </td>
						 </tr>
					 </tbody>
				 </table>
			</div>
			<div class="text-center">
        <ul class="pagination">
          <li class="waves-effect"
					ng-class="main.isActive(i) ? 'active' : ''"
						ng-click="main.switch(i)"
						ng-repeat="i in main.pages">
						<a>[% i %]</a>
					</li>
        </ul>
      </div>
		</div>
	</div>
</div>

<canvas id="bg" height="120px"></canvas>
<section class="streamC">
  <img src="http://i.imgur.com/FKJGGTt.png" />
</section>

<section class="player" id="pl">
  <div class="darkenBlur"></div>

  <i class="fa fa-fast-backward"></i>
  <img id="cover">
  <i class="pause fa fa-play"></i>
  </img>
<i class="fa fa-fast-forward"></i>

<span class="info">
  <span class="time hidden-mobile">00:00</span>
  <span class="song">Preloading...</span>
  <span class="dur hidden-mobile"></span>
</span>
<div class="progress"></div>

<div class="controls hidden-mobile">
  <i class="fa fa-repeat inactive"></i>
  <i class="fa fa-random inactive"></i>
</div>

<div class="volume"></div>
<span class="vol"></span>


</section>

<audio id="audio" src="https://a.clyp.it/psh4mvhq.mp3" preload></audio>
@stop
