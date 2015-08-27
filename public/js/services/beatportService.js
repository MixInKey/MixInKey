angular.module('beatportService', [])

.factory('Beatport', function($http){
    var urlApi = 'http://localhost:8000/api/';
    var genreId, artistId, trackId;
    return {
    		getOne : function(trackId) {
            return $http.get(urlApi+'track/'+trackId);
    		},
    		getTracks : function(genreId) {
            return $http.get(urlApi+'genre/'+genreId);
    		},
    		getByArtist : function(artistId) {
            return $http.get(urlApi+'artist/'+artistId);
    		},
    		getPlayer : function(trackId) {
            return 'http://embed.beatport.com/tracks/?id='+trackId+'&type=tracks';
    		}
    }
});
