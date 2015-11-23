angular.module('beatportService', [])

.factory('Beatport', function($http){
    var urlApi = 'http://localhost:8000/';
    var genreId, artistId, trackId;
    return {
    		getOne : function(trackId) {
            return $http.get(urlApi+'track/'+trackId);
    		},
    		getTracks : function() {
            var data = {
              facets : 'artistId:405818',
              url : 'tracks',
              perPage : '150'
            }
            var value = $.param(data);
            return $http({
              method: 'POST',
              url: '/request',
              headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
              data: value
            });
    		},
    		getByArtist : function(artistId) {
            return $http.get(urlApi+'artist/'+artistId);
    		},
    		getAllArtists : function() {
            return $http.get(urlApi+'artists');
    		},
    		getAllGenres : function() {
            return $http.get(urlApi+'genres');
    		},
    }
});
