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
  <script src="js/angularmodules/adminlogin_module.js"></script>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/sweetalert-master/dist/sweetalert.css">
  <link rel="stylesheet" href="node_modules/kartiv-fileinput/css/fileinput.min.css">
  <link rel="stylesheet" href="css/adminLogin_styles.css">
  <title>Document</title>
</head>
<body ng-app="myapp" ng-controller="main">
  <div class = "container">
	<div class="wrapper">
		<form   class="form-signin">
		    <h3 class="form-signin-heading">Bienvenido Administrador</h3>
			  <hr class="colorgraph"><br>

			  <input type="text" class="form-control" name="Username" placeholder="Username"  ng-model="toLogin.username"/>
			  <input type="password" class="form-control" name="Password" placeholder="Password" ng-model="toLogin.password"/>

			  <button class="btn btn-lg btn-primary btn-block" ng-click="Login()">Login</button>
		</form>
	</div>
</div>
</body>
</html>
