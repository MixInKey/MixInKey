(function(app) {
    $(document).ready(function(){
        var rangeSlider = document.getElementById('slider-range');
        $(this).tooltip();

        $('.collapsible').collapsible({
            accordion : false
        });
        $(".button-collapse").sideNav();

        $(".title-search-collapse").click(function(){
            $(".search-collapse").slideToggle("slow");
        });

        $('#search')
        .on('focus', function() {
            $(this).toggleClass('field-border');
        })
        .on('blur', function() {
            $(this).toggleClass('field-border');
        });

    });

    app.config(function($routeProvider, $locationProvider){
        $routeProvider.
        when('/search',{
            templateUrl: 'Search/index.html',
        })
        .when('/results/:page',{
            templateUrl: 'Search/index.html',
            controller: 'PlayerController',
            controllerAs: 'player',
        })
        .otherwise('/search');
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
