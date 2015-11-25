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
            console.log(param);
            return $http.post(urlApi + '/search/tracks', param);
        }
    }
});
