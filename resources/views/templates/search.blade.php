@extends('layouts.master')

@section('content')
<div class="content">
  <div class="content-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-push-3 col-sm-10 col-sm-push-1">
          <h1 class="heading hidden-xs hidden-xx">Recherche Avancée</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
		<div class="col-md-12">
			<div class="panel panel-default">
      <div class="panel-body filtres">
        <div class="form-group form-group-label" ng-init="findGenres()">
          <label for="genre">Genre</label>
          <select class="form-control" id="genre">
              <option ng-repeat="genre in genres"><% genre.name %></option>
          </select>
        </div>
        <div class="form-group form-group-label slide-bpm" >
          <label for="bpm-input">BPM</label>
          <div id="BPM">
            <input id="bpm-input" class="mdl-slider mdl-js-slider" type="range" min="0" max="100" value="0" tabindex="0"/>
            {{-- <a ng-click="lessBpm()" class="btnlabel-less"><i class="fa fa-minus"></i></a> --}}
            <button ng-click="lessBpm()" class="label-less mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
              <i class="material-icons">remove</i>
            </button>
            <button ng-click="moreBpm()" class="label-more mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
              <i class="material-icons">add</i>
            </button>
          </div>
        </div>
        <div class="form-group form-group-label">
          <div class="col-md-3">
            <div class="checkbox checkbox-adv">
              <label for="input-checkbox-1">
                <input class="access-hide" id="input-checkbox-1" name="input-checkbox" type="checkbox">Option 1
                <span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="checkbox checkbox-adv">
              <label for="input-checkbox-2">
                <input class="access-hide" id="input-checkbox-2" name="input-checkbox" type="checkbox">Option 2
                <span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="checkbox checkbox-adv">
              <label for="input-checkbox-3">
                <input class="access-hide" id="input-checkbox-3" name="input-checkbox" type="checkbox">Option 3
                <span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="checkbox checkbox-adv">
              <label for="input-checkbox-4">
                <input class="access-hide" id="input-checkbox-4" name="input-checkbox" type="checkbox">Option 4
                <span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
              </label>
            </div>
          </div>
          <div class="center">
              <a href="{{ URL::to('/call') }}" class="btn btn-block waves-attach waves-button">Search</a>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop
