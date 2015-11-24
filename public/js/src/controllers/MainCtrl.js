'use strict'

angular.module('MainCtrl', [])
  .controller('MainController', function ($scope, $sce, Beatport) {
    var type;
    // Initialize scope models
    $scope.tracks = {}, $scope.artists = {}, $scope.genres = {}, $scope.BPM = 0; $scope.query;
    $scope.currentTrack = '5500589';
    $scope.currentPlayer = $sce.trustAsResourceUrl('http://embed.beatport.com/player/?id=5500589&type=track');

    /**
     * Beatport API calls
     * @method GET
     * @return {Object} $scope.data query-results
     */
    $scope.changeTrack = function (trackId) {
        $scope.currentPlayer = $sce.trustAsResourceUrl('http://embed.beatport.com/player/?id=' + trackId + '&type=track');
        $scope.currentTrack = trackId;
    };

    $scope.findTracks = function() { // $scope.variable && $scope.function() can be used in templates(directives) and controllers
      Beatport.getTracks() //  Call method of Beatport service (object as module dependency & this controller param)
        .success(function(data) {
            $scope.tracks = data;  // success , reset the $scope variable with new data to refresh in template
        })
        .error(function(data) {
            console.log(data); // error , log the server response in console at network tab (with PHP error)
        });
    };

    $scope.findGenres = function() {
      Beatport.getAllGenres()
        .success(function(data) {
          $scope.genres = data.results;
            console.log(data.results);
        })
        .error(function(data) {
          console.log(data);
        });
    };

    $scope.request = function(type) {
        if (type == 'genre') {
            console.log($scope.query.genre);
            Beatport.getTracksByGenre($scope.query.genre)
            .success(function(data) {
                console.log(data);
                $scope.tracks = data;

            })
            .error(function(err) {
                console.log(err);
            });

        }
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
