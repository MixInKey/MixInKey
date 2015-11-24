(function(app) {
  var rangeSlider = document.getElementById('slider-range');

  // noUiSlider.create(rangeSlider, {
  // 	start: [ 4000 ],
  // 	range: {
  // 		'min': [  2000 ],
  // 		'max': [ 10000 ]
  // 	}
  // });

})(angular.module('beatportApp', [
    'MainCtrl',
    'beatportService',
],function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}));

$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
    $(".button-collapse").sideNav();

    // PLEASE DON'T USE FOR NOW
    // $(document).ready(function() {
    //     $('select').material_select();
    // });
});
