var capp = angular.module('capp', ['ui.router']);
capp.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/aprobaciones');

  $stateProvider.state('aprobaciones', {
    url:'/aprobaciones',
    views:{
      'content':{
        templateUrl:'templates/cp-aprobarRecetas.html',
        controller: 'aprobarController',
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


capp.controller('aprobarController', ['$scope', '$http', function($scope, $http){
  $http.post('/cargarRecetasAAprobar',{})
  .then(function successCallback(response) {

    $scope.recetasAAprobar = response.data;
    console.log($scope.recetasAAprobar);

  }, function errorCallback(response) {
    console.log("Error");
  });

  $scope.datosReceta = {rid:''}

  $scope.leerReceta = function(rid)
  {
    window.location = "/verreceta=" + rid;
  }
  $scope.aprobar = function(rid)
  {
    $scope.datosReceta.rid = rid;
    $http.post('/aprobarReceta',$scope.datosReceta)
    .then(function successCallback(response) {

      console.log(response.data);
      if(response.data == "ok")
      {
        swal('Receta Aprobada')
        $http.post('/cargarRecetasAAprobar',{})
        .then(function successCallback(response) {

          $scope.recetasAAprobar = response.data;
          console.log($scope.recetasAAprobar);

        }, function errorCallback(response) {
          console.log("Error");
        });
      }

    }, function errorCallback(response) {
      console.log("Error");
    });
  }
}]);

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
