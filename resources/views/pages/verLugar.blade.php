<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lugares</title>
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/rateyo/min/jquery.rateyo.min.js"></script>
  <script src="node_modules/angular/angular.js"></script>
  <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/sweetalert-master/dist/sweetalert.min.js"></script>
  <script src="node_modules/kartiv-fileinput/js/fileinput.min.js"></script>
  <script src="js/angularmodules/verlugares_module.js"></script>


  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/sweetalert-master/dist/sweetalert.css">
  <link rel="stylesheet" href="node_modules/kartiv-fileinput/css/fileinput.min.css">
  <link rel="stylesheet" href="node_modules/rateyo/min/jquery.rateyo.min.css">
</head>
<body ng-app="myapp" ng-controller="mainController">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <h1 class="landing-title">El Maya indomable</h1>
        <!--
        <a href="#" id="gotorecetas"><img src="assets/down-arrow.png" class="img-responsive img-gotorecetas" alt=""></a>
        <p class="gotorecetas-text">Ver las últimas recetas</p>
      -->
      </div>
      <div class="col-md-5">
        <nav class="navbar navbar-default menu-welcome" >
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Menú</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lugares <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li ng-repeat="lugar in lugares"><a ng-href="/verlugar=<%lugar.id%>"><%lugar.nombre%></a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-left">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
              </form>
              <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta<span class="caret"></span></a>
                  <ul class="dropdown-menu">

                    <li ng-if="usuarioon == 1"><a href="#" ng-click="cerrarSesion();">Cerrar Sesión</a></li>
                    <li ng-if="usuarioon == 1"><a href="#" onclick="location = '/miBaulV'">Mi Baul</a></li>
                    <li  ng-if="usuarioon == 0"><a href="#" data-toggle="modal" data-target="#registrarse">Registrarse</a></li>
                    <li  ng-if="usuarioon == 0"><a href="#" data-toggle="modal" data-target="#iniciarSesion">Iniciar Sesión</a></li>


                  </ul>
                </li>

              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Nuevo León</h1>
      </div>
    </div>
    <div class="row">
    <div class="col-sm-6 col-md-4"  ng-repeat="receta in recetasDelLugar">


    <div class="thumbnail" >
      <img ng-src="<%receta.portada%>" alt="...">
      <div class="caption">
        <h3><%receta.titulo%></h3>

        <!--<p><%receta.descripcion%></p>-->
        <a href="#" class="btn btn-primary" role="button" ng-click="leerReceta(receta.id)">Leer</a>
      </div>
    </div>





    </div>


    </div>

  </div>

</body>
</html>
