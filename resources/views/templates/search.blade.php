@extends('layouts.master')

@section('content')
<div class="container">
		<div class="main z-depth-2">
			<div class="page-header">
				<h1>Recherche Avancée</h1> 
			</div><br>
			
			 <div class="container">
				 <div class="genre" data-ng-init="findGenres()">
					<label>Genre</label>
				    <select id="genre">
				      <option data-ng-repeat="genre in genres"></option>
				    </select><br>
				 </div>
			    
			    <form action="#">
				    <label>BPM</label>
				    <p class="range-field">
				      <input type="range" id="range" min="0" max="100" />
				      {{-- <a data-ng-click="lessBpm()"><i class="fa fa-minus"></i></a> --}}
			            <button data-ng-click="lessBpm()" >
			              <i class="material-icons">remove</i>
			            </button>
			            <button data-ng-click="moreBpm()">
			              <i class="material-icons">add</i>
			            </button>
				    </p>
				</form><br>
				
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
				    <a class="waves-effect waves-light btn"><i class="material-icons left">search</i>Rechercher</a>
			    </div>
			 </div>
		</div>
	</div>
@stop
