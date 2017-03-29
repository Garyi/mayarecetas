var wapp = angular.module('wapp',[]);
/*
wapp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);
*/

wapp.controller('MainController', ['$scope', '$http', function($scope, $http){
  console.log(1);

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
	//console.log($scope.usuarioAregistrar);
	//console.log($scope.usuarioAregistrar.correo);
	//console.log($scope.usuarioAregistrar.pwd);
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
			swal("Error");
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