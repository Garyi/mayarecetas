var wapp = angular.module('wapp', [], function($interpolateProvider){
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});


wapp.controller('MainController', ['$scope', '$http', '$location', function($scope, $http, $location){

console.log($location.absUrl())
  $http.post('getAllRecetas',{})
  .then(function successCallback(response) {
    $scope.todasRecetas = response.data;
    console.log(response.data);
  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

$scope.leerReceta = function(rid)
{
  window.location = "verreceta=" + rid;
}


	$scope.usuarioRegister = {email:'', username:'', password:''};
	$scope.registrarU = function() {
		if(
			$scope.usuarioRegister.email == undefined ||
			$scope.usuarioRegister.username == undefined ||
			$scope.usuarioRegister.password == undefined ||
			$scope.usuarioRegister.email == '' ||
			$scope.usuarioRegister.username == '' ||
			$scope.usuarioRegister.password == ''
			){
			swal('Favor de llenar todos los datos correctamente');
		}
		else {
			console.log($scope.usuarioRegister);
			$scope.realizarRegistro();
		}
	}

	$scope.realizarRegistro = function() {

		$http.post('/registerUser', $scope.usuarioRegister) //Posible error aquí HTTP/1.1 500 Internal Server Error
		.then(function(response){
			if (response.data == 0) {
				swal("Registro exitoso");
			}
			else if (response.data == 1) {
				swal("Nombre de usuario y correo ya existen");
				location.reload();
			}
			else if (response.data == 2) {
				swal("Nombre de usuario existente");
				location.reload();
			}
			else if (response.data == 3) {
				swal("Correo electrónico existente");
				location.reload();
			}

		}, function() {
			swal("Error del servidor");
		})

	}


	$scope.userLogin = {username:'', password:''};
	$scope.iniciarSesionU = function() {
		$http.post('/loginUser', $scope.userLogin)
		.then(function(response){
			if (response.data == 401) {
				swal("Datos incorrectos")
			}
			else {
				location.reload();
				console.log(response.data)
			}
		}, function() {
			swal("Error del servidor");
		})

	}


	$scope.cerrarSesion = function() {

		$http.post('/cerrarSesion')
		.then(function(){
			location.reload()
		}, function() {
			swal('Error del servidor')
		})
	}



    $('#gotorecetas').on('click', function (e) {
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

}]);
