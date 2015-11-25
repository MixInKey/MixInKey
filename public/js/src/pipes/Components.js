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

  app.filter('startFrom', startFrom);
  // app.filter('toArray', toArray);

})(angular.module('beatportApp'));
