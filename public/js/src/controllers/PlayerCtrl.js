(function(app) {

    app.controller('PlayerController', function(Beatport, $sce, $rootScope, $timeout) {
        var self = this;
        self.isPlay = false;
        self.currentTrack = {
            id: '5500589',
            audioUrl:  $sce.trustAsResourceUrl('https://geo-samples.beatport.com/lofi/5500589.LOFI.mp3'),
        };

        /**
         * Beatport API calls.
         * @method GET
         * @return {Object} self.data query-results
         */
        self.changeTrack = function (trackId) {
            self.currentTrack.audioUrl = $sce.trustAsResourceUrl('https://geo-samples.beatport.com/lofi/' + trackId + '.LOFI.mp3');
            self.currentTrack.id = trackId;
            $timeout(function() {
                audio.play();
                self.isPlay = self.isPlaying();
            }, 500);
            console.log("Change track - use #" + trackId);
        };

        self.startStop = function() {
            self.isPlaying() ? audio.pause() : audio.play();
            self.isPlay = self.isPlaying();
        };

        /**
         * Trigger click on player's play btn.
         */
        self.play = function() {
            var playBtn = angular.element('#player .pause');
            if (playBtn.hasClass('fa-play')) {
                playBtn.trigger('click');
            }
        };

        /**
         * Check if player is playing.
         */
        self.isPlaying = function() {
            return !audio.paused;
        };

    });

})(angular.module('beatportApp'));
