var wapp = angular.module('wapp',[]);

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
    $('#gotorecetas').on('click', function (e) {
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

}]);

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
