@extends('layouts.master')

@section('content')
<base href="/" />
<div class="search z-depth-1">
	<a class="title-search-collapse">
		<div class="page-header">
			<h3>Search <i class="material-icons">keyboard_arrow_down</i></h3>
		</div><br>
	</a>
	<div class="container search-collapse">

	  <div class="form-group">
	    <div class="input-field col s12">
	      <input id="artistName" type="text" class="validate" ng-model="main.query.artistName">
	      <label for="artistName">Artist</label>
	    </div>
	  </div>

	  <div class="search-select">
	    <div class="form-group form-group-label genre" ng-init="main.findGenres()">
	      <label for="genre">Genres</label>
	      <select class="form-control" id="genre" ng-model="main.query.genre">
	        <option value="[% genre.id %]" ng-repeat="genre in main.genres">[% genre.name %]</option>
	      </select>
	    </div>
	    <div class="form-group form-group-label key">
	      <label for="key">Key</label>
	      <select class="form-control" id="key" ng-model="main.query.key">
	        <<option value="[% key.key %]" ng-repeat="key in main.keys">[% key.value %]</option>
	      </select>
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="bpm">BPM</label>
	    <p class="range-field">
	      <input type="range" name="range" min="0" max="175" id="bpm" ng-model="main.query.bpm" />
	    </p>
	  </div><br>

	  <div class="button-search bot-space">
	    <a ng-click="main.search()" class="waves-effect waves-light btn btn-search-collapse"><i class="material-icons left">search</i>Search</a>
	  </div>
	</div>
</div>
<div ng-view></div>
<div id="player" ng-controller="PlayerController as player">
  <canvas id="bg" height="120px"></canvas>
  <section class="streamC">
    <img src="http://i.imgur.com/FKJGGTt.png" />
  </section>
  <section class="player" id="pl">
    <div class="darkenBlur"></div>
    <i class="fa fa-fast-backward hidden-mobile"></i>
    <img id="cover hidden-mobile">
    	<i class="pause fa" ng-click="player.startStop()" ng-class="player.isPlay ? 'fa-pause' : 'fa-play'"></i>
    </img>
  	<i class="fa fa-fast-forward hidden-mobile"></i>
  	<span class="info">
  	  <span class="time hidden-mobile">00:00</span>
  	  <span class="song">[% player.currentTrack.name %]</span>
  	  <span class="dur hidden-mobile"></span>
  	</span>
  	<div class="progress"></div>
  	<div class="controls hidden-mobile">
  	  <i class="fa fa-repeat inactive"></i>
  	  <i class="fa fa-random inactive"></i>
  	</div>
    <img id="cover" ng-src="[% player.currentTrack.cover %]"/>
  	<div class="volume hidden-mobile"></div>
  	<span class="vol hidden-mobile"></span>
  </section>
  <audio id="audio" ng-src="[% player.currentTrack.audioUrl %]" preload></audio>
</div>
<script src="{{ URL::to('js/src/plugins/player.js') }}"></script>
@stop
