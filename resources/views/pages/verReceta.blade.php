<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/angular/angular.js"></script>
  <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/sweetalert-master/dist/sweetalert.min.js"></script>
  <script src="node_modules/kartiv-fileinput/js/fileinput.min.js"></script>
  <script src="js/angularmodules/verrecetas_module.js"></script>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/sweetalert-master/dist/sweetalert.css">
  <link rel="stylesheet" href="node_modules/kartiv-fileinput/css/fileinput.min.css">
  <title>Document</title>
</head>
<body ng-app="myapp" ng-controller="mainController">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div ng-repeat="receta in recetaInfo">
          <h1><%receta.titulo%></h1>
          <textarea name="name" rows="40" cols="80" style="border:none" disabled="">
            <%receta.descripcion%>
          </textarea>

        </div>
      </div>
    </div>
  </div>

</body>
</html>
