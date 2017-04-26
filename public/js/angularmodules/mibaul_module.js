var bapp = angular.module('baulapp', [], function($interpolateProvider){
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});
bapp.controller('baulController', ['$scope','$http',function($scope,$http)
{
  $scope.leerReceta = function(rid)
  {
    window.location = "verreceta=" + rid;
  }

  console.log("baul");
  $http.post('/getRecetasDeBaulC',{})
  .then(function successCallback(response) {
    $scope.recetasBaul = response.data;
    console.log(response.data);
  }, function errorCallback(response) {

  });

  $http.post('/isUserThereC',{})
  .then(function successCallback(response) {

    $scope.usuarioon = response.data;

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

  $scope.cerrarSesion = function() {

		$http.post('/cerrarSesion')
		.then(function(){
			location = "/";
		}, function() {
			swal('Error del servidor')
		})
	}
}]);
