(function(app) {

    app.controller('MainController', function($sce, Beatport) {
        var self = this;
        var type;
        self.tracks = {}, self.artists = {}, self.genres = {}, self.BPM = 0;
        self.query = { genre: '9' };
        self.currentTrack = '5500589';
        self.currentPlayer = $sce.trustAsResourceUrl('http://embed.beatport.com/player/?id=5500589&type=track');

        /**
         * Beatport API calls
         * @method GET
         * @return {Object} self.data query-results
         */
        self.changeTrack = function (trackId) {
            self.currentPlayer = $sce.trustAsResourceUrl('http://embed.beatport.com/player/?id=' + trackId + '&type=track');
            self.currentTrack = trackId;
        };

        self.findGenres = function() {
          Beatport.getAllGenres()
            .success(function(data) {
                self.genres = data.results;
                console.log(data.results);
            })
            .error(function(data) {
              console.log(data);
            });
        };

        self.search = function() {
            Beatport.findTracks(self.query)
            .success(function(data) {
                console.log(data);
                self.tracks = data;
            })
            .error(function(err) {
                console.log(err);
            });
        };

        /**
         * Customize MaterialSlider (API query-param) to improve UX
         * @param {Number} self.BPM ngModel
         */
        self.moreBpm = function() {
          self.BPM += self.BPM < 100 ? 10 : 0;
          self.BPM = self.BPM <= 100 ? self.BPM : 100;
          document.getElementById('bpm-input').MaterialSlider.change(self.BPM);
        },
        self.lessBpm = function() {
          self.BPM -= self.BPM > 0 ? 10 : 0;
          self.BPM = self.BPM >= 0 ? self.BPM : 0;
          document.getElementById('bpm-input').MaterialSlider.change(self.BPM);
        };

        $('#bpm-input').change(function() {
          self.BPM = parseInt($(this).val());
        });

    });

})(angular.module('beatportApp'));
