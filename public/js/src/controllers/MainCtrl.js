(function(app) {

    app.controller('MainController', function($sce, $rootScope, Beatport) {
        var self = this;
        var type;
        self.tracks = {}, self.artists = {}, self.genres = {}, self.bpm = 0;
        self.tracks.results;
        self.perPage = 30;
        self.currentPage = 0;
        self.pages = [];
        self.lastPage = 0; self.filtered;
        self.nbPages;
        self.query = {};
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

        /**
         * Get all genres to build search select field
         * @return {Object} genres
         */
        self.findGenres = function() {
          Beatport.getAllGenres()
            .success(function(data) {
                self.genres = data.results;
                self.lastPage = 0;
            })
            .error(function(data) {
              console.log(data);
            });
        };

        /**
         * Advanced search called on submit
         * @method GET
         * @return {Object} $tracks
         */
        self.search = function() {
            self.query.page = self.lastPage;
            Beatport.findTracks(self.query)
            .success(function(data) {
                self.tracks = data;
            })
            .error(function(err) {
                console.log(err);
            });
        };

        /**
         * Merge two objects
         * @param  {Object} base First objects
         * @param  {Object} src  2th Obj
         * @return {Object} ba     [description]
         */
        self.extend = function(base, src) {
            count = 0;
            if(self.lastPage < 1)
                return src;
            for (var key in base)
                ++count;
            for (var key in src) {
                base[count] = src[key];
                ++count;
            }
            return base;
      }

        /**
         * Load next pages of items
         * @return {Object} self.tracks
         */
        self.getMoreTracks = function() {
            self.lastPage += 150;
            self.query.page = self.lastPage;
            Beatport.findTracks(self.query)
            .success(function(data) {
                var results = { metadata: data.metadata };
                results.results = [];
                results.results = self.extend(self.tracks.results, data.results);
                self.tracks = results;
                console.log(self.tracks);
            })
            .error(function(err) {
                console.log(err);
            });
        };

        /**
         * Go to a given page
         * @return {Number} self.currentPage
         */
        self.switch = function(index) {
            if (self.nbPages <= index+2) {
                self.getMoreTracks();
            }
            return self.currentPage = index-1;
        };

        /**
         * Interact with player using search results
         * @param  {Number} trackId
         */
        self.changePlayerTrack = function(trackId) {
            var player = angular.element('#player').controller();
            player.changeTrack(trackId);
        };

        /**
         * Customize MaterialSlider (API query-param) to improve UX
         * @param {Number} self.BPM ngModel
         */
        self.moreBpm = function() {
          self.BPM += self.BPM < 100 ? 10 : 0;
          self.BPM = self.BPM <= 100 ? self.BPM : 100;
          document.getElementById('bpm-input').MaterialSlider.change(self.BPM);
        };

        self.lessBpm = function() {
          self.BPM -= self.BPM > 0 ? 10 : 0;
          self.BPM = self.BPM >= 0 ? self.BPM : 0;
          document.getElementById('bpm-input').MaterialSlider.change(self.BPM);
        };

        $('#bpm-input').change(function() {
          self.BPM = parseInt($(this).val());
        });

        /**
         * Return true if index is equal to self.currentPage (paginer)
         * @param  {Number} index  elem index
         * @return {bool}          result of check
         */
        self.isActive = function(index) {
            return (self.currentPage == index-1);
        };

        /**
         * Calcul nb pages from items count
         * @param  {Number} count    Number of items
         * @param  {Number} perPage  Items per page
         * @return {Number}          Nb of pages
         */
        self.getNbPages = function(count, perPage) {
            return Math.ceil(count/perPage);
        };

        /**
         * Watch for make update paginer dynamically
         */
        $rootScope.$watch(function() {
            return self.filtered;
        }, function (newValue, oldValue) {
            i = 0;
            angular.forEach(newValue, function(item) {
                i++;
            });
            var nbPages = self.getNbPages(i, self.perPage);
            self.nbPages = nbPages;
            var newPages = [];
            for (var i = 1; i <= nbPages; i++)
                newPages.push(i);
            self.pages = newPages;
            self.currentPage = 0;
        }, true);

    });

})(angular.module('beatportApp'));
