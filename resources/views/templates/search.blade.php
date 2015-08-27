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
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
					<section class="content-inner">
						<p><a class="btn collapsed waves-attach waves-button" data-toggle="collapse" href="#BPM"><span class="collapsed-hide"><i class="icon icon-lg">close</i> BPM</span><span class="collapsed-show"><i class="icon icon-lg">view_list</i> BPM</span></a></p>
						<div class="collapsible-region collapse in" id="BPM">
              <div class="form-group form-group-label slide-bpm">
                    <input class="mdl-slider mdl-js-slider" type="range" min="0" max="100" value="0" tabindex="0"/>
                    <span class="label-less"><i class="fa fa-minus"></i></span>
                    <span class="label-more"><i class="fa fa-plus"></i></span>
              </div>
					</section>
				</div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <section class="content-inner">
              <p><a class="btn collapsed waves-attach waves-button" data-toggle="collapse" href="#KEY"><span class="collapsed-hide"><i class="icon icon-lg">close</i> KEY</span><span class="collapsed-show"><i class="icon icon-lg">view_list</i> KEY</span></a></p>
              <div class="collapsible-region collapse in" id="KEY">
                <div class="form-group">
                  <div class="checkbox checkbox-adv">
                    <label for="input-checkbox-1">
                      <input class="access-hide" id="input-checkbox-1" name="input-checkbox" type="checkbox">Option 1
                      <span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
                    </label>
                  </div>
                  <div class="checkbox checkbox-adv">
                    <label for="input-checkbox-2">
                      <input class="access-hide" id="input-checkbox-2" name="input-checkbox" type="checkbox">Option 2
                      <span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
                    </label>
                  </div>
                  <div class="checkbox checkbox-adv">
                    <label for="input-checkbox-3">
                      <input class="access-hide" id="input-checkbox-3" name="input-checkbox" type="checkbox">Option 3
                      <span class="circle"></span><span class="circle-check"></span><span class="circle-icon icon">done</span>
                    </label>
                  </div>
                </div>
              </div>
            </section>
          </div>
      </div>
    </div>
  </div>
</div>
@stop
