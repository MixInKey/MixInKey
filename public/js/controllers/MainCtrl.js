angular.module('MainCtrl', [])

.controller('MainController', function ($scope, $interval, Beatport) {

    Beatport.getTracks()
      .success(function(data){
          $scope.ops = data;
          $scope.query.id = '!!';
      })
      .error(function(data){
          console.log(data);
      });
});
