var wapp = angular.module('wapp',[]);

wapp.controller('MainController', ['$scope', '$http', function($scope, $http){
  console.log(1);


    $('#gotorecetas').on('click', function (e) {
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

}]);
