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
          templateUrl: 'Search/form.html'
        };
    };

    app.directive('resultsBlock', ResultsComponent);
    app.directive('searchForm', SearchFormComponent);

})(angular.module('beatportApp'));
