myapp = angular.module('myapp', [], function($interpolateProvider)
{
  $interpolateProvider.startSymbol('<%');
       $interpolateProvider.endSymbol('%>');
});
myapp.controller('mainController', ['$scope', '$http', function($scope, $http){
  console.log(111);
  $http.post('/getRecetaInfo',{})
  .then(function successCallback(response) {
    console.log(response.data);
    $scope.recetaInfo = response.data;
  }, function errorCallback(response) {
    console.log("Error");
  });
}]);
