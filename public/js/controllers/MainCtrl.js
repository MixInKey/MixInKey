angular.module('MainCtrl', [])

.controller('MainController', function ($scope, Beatport) {

    $scope.tracks = {}, $scope.artists = {}, $scope.genres;

    $scope.findTracks = function(){
        Beatport.getTracks()
          .success(function(data){
              $scope.tracks = data;
          })
          .error(function(data){
              console.log(data);
          });
    };

    $scope.findArtists = function(){
        Beatport.getAllArtists()
          .success(function(data){
              $scope.artists = data.results;
          })
          .error(function(data){
              console.log(data);
          });
    };

    $scope.findGenres = function(){
        Beatport.getAllGenres()
          .success(function(data){
              $scope.genres = data.results;
          })
          .error(function(data){
              console.log(data);
          });
    };

    $scope.findGenres();

});
