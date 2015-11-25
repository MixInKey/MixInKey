(function(app) {

    function ResultsComponent() {
        return {
            restrict: 'EA',
            replace: true,
            templateUrl: 'Search/results.html',
        };
    };

    function SearchFormComponent() {
        return {
            restrict: 'EA',
            replace: true,
            templateUrl: 'Search/form.html',
        };
    };

    function PlayerComponent() {
        return {
            restrict: 'EA',
            replace: true,
            templateUrl: 'Search/player.html',
            controller: 'SearchController',
            controlllerAs: 'search',
        };
    };

    app.directive('resultsBlock', ResultsComponent);
    app.directive('searchForm', SearchFormComponent);
    app.directive('player', PlayerComponent);

})(angular.module('beatportApp'));
