(function(app) {

    $(document).ready(function(){
        var rangeSlider = document.getElementById('slider-range');

        $('.collapsible').collapsible({
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
        $(".button-collapse").sideNav();

        // PLEASE DON'T USE FOR NOW
        // $(document).ready(function() {
        //     $('select').material_select();
        // });
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
    'ngRoute'
],function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}));
