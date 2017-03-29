var capp = angular.module('capp', ['ui.router']);
capp.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/aprobaciones');

  $stateProvider.state('aprobaciones', {
    url:'/aprobaciones',
    views:{
      'content':{
        templateUrl:'templates/cp-aprobarTareas.html',
      }
    }
  })

  $stateProvider.state('perfiles', {
    url:'/perfiles',
    views:{
      'content':{
        templateUrl:'templates/cp-controlarPerfiles.html',
        controller: 'perfilesController',

      }
    }
  })
});

capp.controller('perfilesController', ['$scope', '$http', function($scope, $http){
  $scope.permisoElegido = {permiso:''}
  $http.post('/getProfiles',{})
  .then(function successCallback(response) {
    $scope.perfilesExistentes = response.data;

  }, function errorCallback(response) {
    console.log("Error");
  });


  $http.post('/getUsers', {})
  .then(function successCallback(response){
    $scope.usuariosExistentes = response.data;
    console.log(response.data);
  }, function errorCallback(response){
    console.log("Error");
  });


$scope.cambioPermisoData = {userid:'', permiso:''}
  $scope.cambiarPermiso = function(uID){
    console.log("El uid", uID);
    console.log("El permiso", $scope.permisoElegido);
    $scope.cambioPermisoData.userid = uID;
    $scope.cambioPermisoData.permiso = $scope.permisoElegido.permiso;

    $http.post('/changeProfile', $scope.cambioPermisoData)
    .then(function successCallback(response) {
      console.log(response.data);

    }, function errorCallback(response) {
      console.log("Error");
    });



  }
}]);
