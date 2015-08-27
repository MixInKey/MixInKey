angular.module('beatportService', [])

.factory('Beatport', function($http){
    var urlApi = 'http://localhost:8000/api/'
    return {
    		getOne : function(trackId) {
            return $http.get(urlApi+'track/'+genreID);
    		},
    		getTracks : function(genreId) {
            return $http.get(urlApi+'genre/'+genreID);
    		},
    		getByArtist : function(artistId) {
            return $http.get(urlApi+'artist/'+artistId);
    		},
    		getPlayer : function(trackId) {
            return 'http://embed.beatport.com/tracks/?id='+trackId+'&type=tracks';
    		}
    }
});
