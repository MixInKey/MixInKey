@extends('layouts.master')

@section('content')
<base href="/" />
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
