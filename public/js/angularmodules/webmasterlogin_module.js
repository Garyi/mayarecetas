var myapp = angular.module('myapp',[]);

myapp.controller('mainController', ['$scope', '$http', function($scope, $http){
  $scope.toLogin = {username:'', password:''};
  $scope.Login = function()
  {
    console.log($scope.toLogin);
    $http.post('/loginWebMaster',$scope.toLogin)
    .then(function successCallback(response) {
      if(response.data == 401)
      {
        swal("Error en usuario / Contraseña");
      }
      else if (response.data == 200) {
        window.location = "/subirRecetas";
      }

    }, function errorCallback(response) {
      console.log("Error");
    });
  }
}]);
