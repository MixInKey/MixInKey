(function(app) {
  var rangeSlider = document.getElementById('slider-range');

  noUiSlider.create(rangeSlider, {
  	start: [ 4000 ],
  	range: {
  		'min': [  2000 ],
  		'max': [ 10000 ]
  	}
  });

})(angular.module('beatportApp', [
    'MainCtrl',
    'beatportService',
],function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}));
