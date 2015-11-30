(function(app) {

    app.controller('PlayerController', function(Beatport, $sce, $rootScope, $routeParams, $timeout) {
        var self = this;
        self.isPlay = false;
        self.currentTrack = {
            id: '2003405',
            audioUrl:  $sce.trustAsResourceUrl('https://geo-samples.beatport.com/lofi/2003405.LOFI.mp3'),
            name: 'Mary Jane',
            cover: 'http://geo-media.beatport.com/image/2990439.jpg',
        };

        self.forward = function() {
            console.log($routeParams);
        };
        
        /**
         * Beatport API calls.
         * @method GET
         * @return {Object} self.data query-results
         */
        self.changeTrack = function (track) {
            self.currentTrack.audioUrl = $sce.trustAsResourceUrl('https://geo-samples.beatport.com/lofi/' + track.id + '.LOFI.mp3');
            self.currentTrack.id = track.id;
            self.currentTrack.name = track.name;
            self.currentTrack.cover = track.images.medium.url;
            $timeout(function() {
                audio.play();
                self.isPlay = self.isPlaying();
            }, 500);
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

        self.getResourceUrl = function(url) {
            return $sce.getResourceUrl(url);
        };

    });

})(angular.module('beatportApp'));
