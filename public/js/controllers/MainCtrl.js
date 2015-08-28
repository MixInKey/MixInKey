'use strict'

angular.module('MainCtrl', [])
  .controller('MainController', function ($scope, Beatport) {

    // Initialize scope models
    $scope.tracks = {}, $scope.artists = {}, $scope.genres = {}, $scope.BPM = 0;

    /**
     * Beatport API calls
     * @method GET
     * @return {Object} $scope.data query-results
     */
    $scope.findTracks = function() { // $scope.variable && $scope.function() can be used in templates(directives) and controllers
      Beatport.getTracks() //  Call method of Beatport service (object as module dependency & this controller param)
        .success(function(data) {
            $scope.tracks = data;  // success , reset the $scope variable with new data to refresh in template
        })
        .error(function(data) {
            console.log(data); // error , log the server response in console at network tab (with PHP error)
        });
    },

    $scope.findArtists = function() {
      Beatport.getAllArtists()
        .success(function(data) {
          $scope.artists = data.results;
        })
        .error(function(data) {
          console.log(data);
        });
    },

    $scope.findGenres = function() {
      Beatport.getAllGenres()
        .success(function(data) {
          $scope.genres = data.results;
        })
        .error(function(data) {
          console.log(data);
        });
    };

    /**
     * Customize MaterialSlider (API query-param) to improve UX
     * @param {Number} $scope.BPM ngModel
     */
    $scope.moreBpm = function() {
      $scope.BPM += $scope.BPM < 100 ? 10 : 0;
      $scope.BPM = $scope.BPM <= 100 ? $scope.BPM : 100;
      document.getElementById('bpm-input').MaterialSlider.change($scope.BPM);
    },
    $scope.lessBpm = function() {
      $scope.BPM -= $scope.BPM > 0 ? 10 : 0;
      $scope.BPM = $scope.BPM >= 0 ? $scope.BPM : 0;
      document.getElementById('bpm-input').MaterialSlider.change($scope.BPM);
    };

    $('#bpm-input').change(function() {
      $scope.BPM = parseInt($(this).val());
    });

});
