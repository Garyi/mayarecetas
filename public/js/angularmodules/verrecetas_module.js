myapp = angular.module('myapp', [], function($interpolateProvider)
{
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});
myapp.controller('mainController', ['$scope', '$http','$location', function($scope, $http, $location){

  var url = $location.absUrl();
  console.log(url);
  var peticionid = url.split("verreceta=")[1];
  console.log(peticionid);
  $scope.peticion = {id:''}
  $scope.peticion.id = peticionid
  $http.post('/getRecetaInfo',$scope.peticion)
  .then(function successCallback(response) {
    console.log(response.data);
    $scope.recetaInfo = response.data;
  }, function errorCallback(response) {
    console.log("Error");
  });

  $http.post('/isUserThereC',{})
  .then(function successCallback(response) {

    $scope.usuarioon = response.data;

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });
}]);
