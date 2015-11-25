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
            templateUrl : 'Search/index.html'
        });
        $locationProvider.html5Mode(true);
    });
    angular.module('templates', []);

})(angular.module('beatportApp', [
    'beatportService',
    'ngRoute',
    'templates',
    'ui.bootstrap'
],function($interpolateProvider){
    $interpolateProvider.startSymbol('[%');
    $interpolateProvider.endSymbol('%]');
}));
