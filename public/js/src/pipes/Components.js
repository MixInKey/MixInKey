(function(app) {

  /**
   * Pagination method
   * @return {index} startFrom first item
   */
  function startFrom() {
    return function(input, start) {
      if (!input)
        return;
      start = +start;
      return input.slice(start);
    };
  };

  /**
   * Replace string portion by #
   * @return {string} str
   */
  function serializeKey() {
    return function(str) {
      if (!str) {
        return;
      }
      if (str.search(str) > -1) {
        str = str.replace('&#9839;', '#');
      }
      return str;
    };
  };

  function listArtists(){
    return function(artists) {
      if (!artists) {
        return;
      }
      var result = '';
      if (artists.length > 0) {
        artists.forEach(function(artist) {
            result += result.length > 0 ? ', ' + artist.name : artist.name;
        });
        return result;
      }
    };
  };

  function bpm() {
    return function(bpm) {
      if (bpm == 0) {
        return;
      }
      return bpm;
    };
  };


  app.filter('startFrom', startFrom);
  app.filter('serializeKey', serializeKey);
  app.filter('listArtists', listArtists);
  app.filter('emptyBpm', bpm);

})(angular.module('beatportApp'));
