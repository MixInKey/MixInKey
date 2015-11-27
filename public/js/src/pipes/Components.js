(function(app) {

  /**
   * Pagination method
   * @return {index} startFrom first item
   */
  function startFrom() {
    return function(input, start) {
      if(!input)
        return;
      start = +start;
      return input.slice(start);
    }
  };

  /**
 * Convert scope obj to array
 * @param  {Object} obj
 * @return {Array} items
 */
function toArray() {
  return function (obj, addKey) {
    if(!obj)
      return obj;
    if( addKey === false ) {
      return Object.keys(obj).map(function(key) {
        return obj[key];
      });
    }else{
      return Object.keys(obj).map(function (key) {
        return Object.defineProperty(obj[key], '$key', { enumerable: false, configurable: true, value: key});
      });
    }
  };
};
  function serialize(){
    return function(str){
      if(!str){
        return;
      }
      if(str.search(str) > -1){
        str = str.replace('&#9839;', '#');
      }
      return str;
    }
  }

  function implode(){
    return function(artists){
      if(!artists){
        return;
      }
      var result = '';
      if(artists.length > 0){
        artists.forEach(function(artist){
          if (result.length > 0)
              result += ', ' + artist.name;
          else
            result = artist.name;
        });

        return result;

      }
    }
  }

  //&#9839;
  app.filter('startFrom', startFrom);
  // app.filter('toArray', toArray);
  app.filter('serializeKey', serialize);
  app.filter('implodeArtists', implode);

})(angular.module('beatportApp'));
