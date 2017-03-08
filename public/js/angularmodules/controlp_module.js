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
  });

});
