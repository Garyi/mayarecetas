var rapp = angular.module('rapp', [], function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

rapp.controller('MainController', ['$scope', '$http', '$location', function($scope, $http, $location){
	$scope.receta = {titulo: '', lugar: '', descripcion: ''}
	console.log($scope.receta);
	$scope.subirReceta = function(){
		$http.post('/subirRecetasC', $scope.receta)
		.then(function(response){
			if(response.data == 0) {
				swal('todo bien al parecer...')
			}
		}, function() {
			swal("Error del servidor")
		})

	}



	angular.element(document).ready(function () {

		$http.post('/getLugares')
		.then(function(response){
			$scope.lugares = response.data;
			console.log(response.data)
		}, function() {
			sawl('Error del servidor')
		})
    });
}])
