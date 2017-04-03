var wapp = angular.module('wapp',[]);
/*
wapp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);
*/

wapp.controller('MainController', ['$scope', '$http', function($scope, $http){

  	/*$scope.usuario = "Jesus";
	$scope.contrasena = 123;
	$scope.sweetalert = function() {
		swal({
  			title: "Error!",
  			text: "Here's my error message!",
  			type: "error",
  			confirmButtonText: "Cool"
			});
	}
	*/

	/*var req = {
 method: 'POST',
 url: '/loginUser',
 headers: {
   'Content-Type': undefined
 },
 data: { test: 'test' }
}*/


	/*
	    ***********************************************************************************************************
		***                   *************************************************************************************
		***Registro de Usuario*************************************************************************************
		***                   *************************************************************************************
		***********************************************************************************************************
	*/
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

	/*
	    ***********************************************************************************************************
		***                   *************************************************************************************
		***Inicio de sesión   *************************************************************************************
		***                   *************************************************************************************
		***********************************************************************************************************
	*/



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


	$scope.receta = {titulo: '', categoria: '', estado: '', descripcion: ''}
	$scope.subirReceta = function(){
		$http.post('/subirRecetas', $scope.receta)
		.then(function(response){
			if(response.data == 0) {
				swal('todo bien al parecer...')
			}
		}, function() {
			swal("Error del servidor")
		})

	}

















    $('#gotorecetas').on('click', function (e) {
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

}]);
/*
wapp.controller('SweetalertController', ['$scope', function($scope){

	$scope.sweetalert = function() {
		swal({
  			title: "Error!",
  			text: "Here's my error message!",
  			type: "error",
  			confirmButtonText: "Cool"
			});
	}

	$scope.usuario = "Jesus";
	$scope.contrasena = 123;
	


}]);

*/