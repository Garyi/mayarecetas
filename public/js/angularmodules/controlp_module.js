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

  $http.post('/getProfiles',{})
  .then(function successCallback(response) {
    $scope.perfilesExistentes = response.data;
  }, function errorCallback(response) {
    console.log("Error");
  });
}]);
