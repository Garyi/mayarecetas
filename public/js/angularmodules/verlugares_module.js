myapp = angular.module('myapp', [], function($interpolateProvider)
{
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});
myapp.controller('mainController', ['$scope', '$http','$location', function($scope, $http, $location){

  var url = $location.absUrl();
  console.log(url);
  var peticionid = url.split("verlugar=")[1];
  console.log(peticionid);
  $scope.peticion = {id:''};
  $scope.peticion.id = peticionid;

  $http.post('/getLugarNombreC',$scope.peticion)
  .then(function successCallback(response) {

    $scope.nombreLugar = (response.data[0].nombre);

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

  $http.post('getRecetasDelLugarC',$scope.peticion)
  .then(function successCallback(response) {

    $scope.recetasDelLugar = response.data;
    console.log($scope.recetasDelLugar);

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

  //Navbar inicio

  $http.post('/getLugares',{})
  .then(function successCallback(response) {

    $scope.lugares = response.data;

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });


  //Buscador Navbar
  var buscador = document.getElementById("buscador");
  var awesomplete = new Awesomplete(buscador);

  $http.post('getNombresLugaresC',{})
  .then(function successCallback(response) {
     $scope.awlist = response.data;
    awesomplete.list = response.data;
  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

  $http.post('/isUserThereC',{})
  .then(function successCallback(response) {

    $scope.usuarioon = response.data;

  }, function errorCallback(response) {
    swal("Contacta a un administrador");
  });

  $scope.busqueda = {titulo:''}
  $scope.buscar = function()
  {
    $scope.busqueda.titulo = $("#buscador").val();
    console.log($scope.busqueda);

    $http.post('/getLugarIDC', $scope.busqueda)
    .then(function successCallback(response) {
     $scope.id_busqueda = response.data[0].id;
     window.location = "verlugar="+$scope.id_busqueda;
    }, function errorCallback(response) {
      swal("Contacta a un administrador");
    });



  }
  //Navbar fin

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
    console.log("ini");
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

  //Navbar fin

  $scope.leerReceta = function(rid)
  {
    window.location = "verreceta=" + rid;
  }

}]);
