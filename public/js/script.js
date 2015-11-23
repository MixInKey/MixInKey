var app = angular.module('beatportApp', [
    'MainCtrl',
		'beatportService',
],function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});