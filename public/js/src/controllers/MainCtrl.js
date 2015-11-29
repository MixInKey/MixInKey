(function(app) {

    app.controller('MainController', function($sce, $timeout, $location, $controller, $rootScope, Beatport) {
        var self = this;
        var type;
        self.tracks = {}, self.artists = {}, self.genres = {}, self.bpm = 0;
        self.tracks.results; self.query = {}; self.filtered;
        self.pages = []; self.nbPages;
        self.perPage = 30;
        self.currentPage = 0;
        self.lastPage = 0;
        self.isLoadingItems = false;
        self.NoResultsException = false;
        self.keys = [
            { key : '', value : '' },
            { key : 8, value : 'A Minor' },
            { key : 23, value :'A Major' },
            { key : 26, value: 'A# Minor' },
            { key : 25, value : 'A# Major' },
            { key : 10, value : 'B Minor' },
            { key : 13, value : 'B Major' },
            { key : 5, value : 'C Minor' },
            { key : 20, value : 'C Major' },
            { key : 28, value : 'C# Minor' },
            { key : 27, value : 'C# Major' },
            { key : 7, value : 'D Minor' },
            { key : 22, value : 'D Major' },
            { key : 30, value : 'D# Minor' },
            { key : 29, value : 'D# Major' },
            { key : 9, value : 'E Minor' },
            { key : 24, value :'E Major' },
            { key : 4, value : 'F Minor' },
            { key : 19, value : 'F Major' },
            { key : 11, value : 'F# Minor' },
            { key : 14, value :'F# Major' },
            { key : 6, value : 'G Minor' },
            { key : 21, value : 'G Major' },
            { key : 32, value : 'G# Minor' },
            { key : 31, value : 'G# Major' }
        ];

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
            var artist = self.query.artistName;
            if(artist){
                self.query.artistName = self.formatString(artist);
                console.log(self.query);

            }
            angular.element(".search-collapse").hide("slow");
            self.query.page = self.lastPage = 0;
            Beatport.findTracks(self.query)
            .success(function(data) {
                if (data.results.length < 1 || !data.metadata) {
                    self.NoResultsException = true;
                    $timeout(function() {
                        angular.element('.search-collapse').show('slow');
                        self.NoResultsException = false;
                    }, 1000);
                    self.tracks = {};
                    return self.currentPage = 0;
                }
                self.currentPage = 0;
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
            console.log('number of element: ' + count);
            for (var key in src) {
                base[count] = src[key];
                ++count;
            }
            return base;
        };

        /**
         * Load next pages of items
         * @return {Object} self.tracks
         */
        self.getMoreTracks = function() {
            if (self.pages.length < 4) {
                return;
            }
            self.isLoadingItems = true;
            self.lastPage += 150;
            self.query.page = self.lastPage;
            console.log("Loading tracks ...");
            Beatport.findTracks(self.query)
            .success(function(data) {
                var results = { metadata: data.metadata };
                results.results = [];
                results.results = self.extend(self.tracks.results, data.results);
                self.tracks = results;
                self.isLoadingItems = false;
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
            if (self.nbPages <= index+1) {
                self.getMoreTracks();
            }
            return self.currentPage = index-1;
        };

        /**
         * Interact with player using search results
         * @param  {Number} trackId
         */
        self.changePlayerTrack = function(track) {
            var player = angular.element('#player').controller();
            player.changeTrack(track);
        };

        self.isCurrentTrack = function(trackId) {
            return $controller('PlayerCtrl').currentTrack.id == trackId;
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
         * Watch for update paginer dynamically
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
        }, true);

        $('.search input, .search select').focus(function() {
            $(this).on('keydown', function(e) {
                if (e.keyCode == 13) {
                    self.search();
                }
            });
        });

        self.formatString = function(string) {
            return string.replace(/\w\S*/g, function(string) {
                return string.charAt(0).toUpperCase() + string.substr(1).toLowerCase();
            });
        };
    });



})(angular.module('beatportApp'));
