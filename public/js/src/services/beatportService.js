angular.module('beatportService', [])

.factory('Beatport', function($http){
    var urlApi = window.location.origin;
    var genreId, artistId, trackId, param;
    
    return {
    		getOne : function(trackId) {
            return $http.get(urlApi+'/track/'+trackId);
    		},
    		getByArtist : function(artistId) {
            return $http.get(urlApi+'/artist/'+artistId);
    		},
    		getAllGenres : function() {
            return $http.get(urlApi+'/genres');
    		},
        findTracks : function(param) {
            return $http.get(urlApi + '/search/tracks', param);
        }
    }
});
