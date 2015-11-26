(function(app) {
    $(document).ready(function(){
        var rangeSlider = document.getElementById('slider-range');
        $(this).tooltip();
        $('.collapsible').collapsible({
            accordion : false
        });
        $(".button-collapse").sideNav();

        $(".btn-search-collapse").click(function(){
           $(".search-collapse").hide("slow");
        });

        $(".title-search-collapse").click(function(){
           $(".search-collapse").slideToggle("slow");
        });
    });

    app.config(function($routeProvider, $locationProvider){
        $routeProvider.
        when('/',{
            templateUrl: 'Search/index.html',
            controller: 'PlayerController',
            controllerAs: 'player'
        });
        $locationProvider.html5Mode(true);
    });
    angular.module('templates', []);

})(angular.module('beatportApp', [
    'beatportService',
    'ngRoute',
    'templates',
],function($interpolateProvider){
    $interpolateProvider.startSymbol('[%');
    $interpolateProvider.endSymbol('%]');
}));
