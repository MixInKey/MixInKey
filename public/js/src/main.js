(function(app) {
    $(document).ready(function(){
        var rangeSlider = document.getElementById('slider-range');
        $('.collapsible').collapsible({
            accordion : false
        });
        $(".button-collapse").sideNav();
    });

    app.config(function($routeProvider, $locationProvider){
        $routeProvider.
        when('/',{
            templateUrl : '/js/src/partials/test.html'
        });
        $locationProvider.html5Mode(true);
    });

})(angular.module('beatportApp', [
    'beatportService',
    'ngRoute',
    'ui.bootstrap'
],function($interpolateProvider){
    $interpolateProvider.startSymbol('[%');
    $interpolateProvider.endSymbol('%]');
}));
