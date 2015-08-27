angular.module('MainCtrl', [])

.controller('MainController', function ($scope, Beatport) {

    $scope.tracks = {};

    $scope.findTracks = function(){
        Beatport.getTracks()
          .success(function(data){
              $scope.tracks = data;
          })
          .error(function(data){
              console.log(data);
          });
    };

});
