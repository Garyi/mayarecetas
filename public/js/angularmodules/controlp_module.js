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
  $stateProvider.state('agregarLugares', {
    url:'/agregarLugares',
    views:{
      'content':{
        templateUrl:'templates/cp-agregarLugares.html',
        controller :'agregarLugares',
      }
    }
  })
  $stateProvider.state('eliminarLugares', {
    url:'/eliminarLugares',
    views:{
      'content':{
        templateUrl:'templates/cp-eliminarLugares.html',
        controller :'eliminarLugares',
      }
    }
  })
  $stateProvider.state('actualizarLugares', {
    url:'/actualizarLugares',
    views:{
      'content':{
        templateUrl:'templates/cp-actualizarLugares.html',
        controller :'actualizarLugares',
      }
    }
  })
});

capp.controller('actualizarLugares',['$scope','$http', function($scope, $http){
  $scope.lugarAActualizar = {id:'', nombre:''}
  $scope.desabilitado = true;
  $http.post('/getLugares',{})
  .then(function successCallback(response) {

    $scope.lugaresRegistrados = response.data;
    console.log(response.data);

  }, function errorCallback(response) {
    console.log("Error");
  });

  $scope.actualizarLugar = function(rid)
  {
    $scope.lugarAActualizar.id = rid;
    $http.post('/getLugarEspecifico', $scope.lugarAActualizar)
    .then(function successCallback(response) {

      $scope.lugaresRegistrados = response.data;
      console.log(response.data);

    }, function errorCallback(response) {
      console.log("Error");
    });

    console.log(rid);
    $scope.desabilitado = false;
  }


  // Cuando presiona finalizar
  $scope.aceptarActualiacion = function(rid)
  {
    $scope.desabilitado = true;
    $scope.lugarAActualizar.id = rid;
    console.log($scope.lugarAActualizar);



    $http.post('/actualizarLugar', $scope.lugarAActualizar)
    .then(function successCallback(response) {

      if(response.data == 500)
      {
        swal('Ooops! algo salio mal', "error");
      }

      console.log(response.data);

    }, function errorCallback(response) {
      console.log("Error");
    });

    $http.post('/getLugares',{})
    .then(function successCallback(response) {

      $scope.lugaresRegistrados = response.data;
      console.log(response.data);

    }, function errorCallback(response) {
      console.log("Error");
    });

    $scope.lugarAActualizar = {id:'', nombre:''}
  }

}]);

capp.controller('eliminarLugares',['$scope','$http', function($scope, $http){
  $scope.lugarAEliminar = {id:''}
  console.log("Entramos a eliminar");
  $http.post('/getLugares',{})
  .then(function successCallback(response) {

    $scope.lugaresRegistrados = response.data;
    console.log(response.data);

  }, function errorCallback(response) {
    console.log("Error");
  });

  ///eliminarLugar
  $scope.eliminarLugar = function(lid) {
    $scope.lugarAEliminar.id = lid;
    swal({
  title: "¿Está Seguro?",
  text: "¡No hay vuelta atras!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Sí, ¡elimina!",
  closeOnConfirm: true,
  },
    function(){
      $http.post('/eliminarLugar',$scope.lugarAEliminar)
      .then(function successCallback(response) {

        if(response.data == 100)
        {
          $http.post('/getLugares',{})
          .then(function successCallback(response) {

            $scope.lugaresRegistrados = response.data;
            console.log(response.data);

          }, function errorCallback(response) {
            console.log("Error");
          });

        }
        if(response.data == 500) {
          sweetAlert("Oops...", "¡Algo ocurrió mal!", "error");
        }

      }, function errorCallback(response) {
        console.log("Error");
      });
    });
  }
}]);

capp.controller('agregarLugares',['$scope','$http',function($scope, $http){

  $scope.lugarParaAgregar = {nombre:''}

  $scope.agregar = function()
  {
    console.log($scope.lugarParaAgregar);
    $http.post('/agregarLugar',$scope.lugarParaAgregar)
    .then(function successCallback(response) {

      console.log(response.data);
      $scope.lugarParaAgregar = {nombre:''}

    }, function errorCallback(response) {
      console.log("Error");
    });

    $http.post('/getLugares',{})
    .then(function successCallback(response) {
      $scope.lugaresExistentes = response.data
      console.log(response.data);

    }, function errorCallback(response) {
      console.log("Error");
    });
  }
  $http.post('/getLugares',{})
  .then(function successCallback(response) {
    $scope.lugaresExistentes = response.data
    console.log(response.data);

  }, function errorCallback(response) {
    console.log("Error");
  });

}]);

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

  $scope.eliminar = function(rid)
  {
    $scope.recetaAEliminar = {id:rid}
    console.log(rid);
    swal({
  title: "¿Está Seguro?",
  text: "¡No hay vuelta atras!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Sí, ¡elimina!",
  closeOnConfirm: true,
  },
    function(){
      $http.post('/eliminarRecetaC', $scope.recetaAEliminar)
      .then(function successCallback(response) {
        $scope.recetaAEliminar = {id: ''}
        $http.post('/cargarRecetasAAprobar',{})
        .then(function successCallback(response) {

          $scope.recetasAAprobar = response.data;
          console.log($scope.recetasAAprobar);

        }, function errorCallback(response) {
          console.log("Error");
        });

      }, function errorCallback(response) {
        console.log("Error");
      });
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
