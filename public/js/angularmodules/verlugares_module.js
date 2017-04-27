myapp = angular.module('myapp', [], function($interpolateProvider)
{
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});
myapp.controller('mainController', ['$scope', '$http','$location', function($scope, $http, $location){

  var url = $location.absUrl();
  console.log(url);
  var peticionid = url.split("verlugar=")[1];
  console.log(peticionid);
  $scope.peticion = {id:''};
  $scope.peticion.id = peticionid;

  $http.post('getRecetasDelLugarC',$scope.peticion)
  .then(function successCallback(response) {

    $scope.recetasDelLugar = response.data;
    console.log($scope.recetasDelLugar);

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

// Cosas del navbar
  $http.post('/isUserThereC',{})
  .then(function successCallback(response) {

    $scope.usuarioon = response.data;

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

  $http.post('/getLugares',{})
  .then(function successCallback(response) {

    $scope.lugares = response.data;

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

  $scope.leerReceta = function(rid)
  {
    window.location = "verreceta=" + rid;
  }

}]);
