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
  <script src="node_modules/awesomplete/awesomplete.min.js"></script>
  <link rel="stylesheet" href="node_modules/awesomplete/awesomplete.css">
  <link rel="stylesheet" href="css/welcome_styles.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/sweetalert-master/dist/sweetalert.css">
  <link rel="stylesheet" href="node_modules/kartiv-fileinput/css/fileinput.min.css">
  <title>Document</title>
</head>
<body ng-app="myapp" ng-controller="mainController">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <img src="assets/mexican-woman.png" class="logo-img img-responsive"alt="" style="float:left;">
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
                <li><a href="/">Inicio<span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lugares <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li ng-repeat="lugar in lugares"><a ng-href="/verlugar=<%lugar.id%>"><%lugar.nombre%></a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-left">
                <div class="form-group">

                  <!--Awesomplete starts-->
                  <input id="buscador"  class="form-control" placeholder="Search" />
                  <!--Awesomplete finish-->

                </div>
                <button type="submit" class="btn btn-default" ng-click="buscar()">Buscar</button>
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
        <div ng-repeat="receta in recetaInfo" class="text-center">
          <img src="<%receta.portada%>" alt="" height="200em" class="img-thumbnail">
          <h1><%receta.titulo%></h1>
          <textarea name="name" rows="40" cols="80" style="border:none; background:none;" disabled="">
            <%receta.descripcion%>
          </textarea>

        </div>
      </div>
    </div>
  </div>

  <div id="iniciarSesion" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Iniciar Sesión</h4>
        </div>
        <div class="modal-body">

           <div class="form-group">
            <label for="usr">Usuario:</label>
            <input type="text" id="inputUser" class="form-control" ng-model="userLogin.username" required autofocus>
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña:</label>

            <input type="password" id="inputPassword" class="form-control" ng-model="userLogin.password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button ng-click="iniciarSesionU()" type="button" class="btn btn-default" data-dismiss="modal">Confirmar</button>
        </div>
      </div>

    </div>
  </div>



  <!-- Modal registrarse -->

  <div id="registrarse" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrarse</h4>
        </div>

        <div class="modal-body">
           <div class="form-group">
            <label for="usr">Correo Electrónico:</label>
            <input type="email" id="inputEmail" class="form-control" ng-model="usuarioRegister.email" required autofocus>
          </div>
          <div class="form-group">
            <label for="usr">Nombre de usuario:</label>
            <input type="text" id="inputEmail" class="form-control" ng-model="usuarioRegister.username" required autofocus>
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" id="inputPassword" class="form-control" ng-model="usuarioRegister.password" required>
          </div>
        <div class="modal-footer">
          <button ng-click="registrarU();" type="button" class="btn btn-default" data-dismiss="modal">Registrarse</button>
        </div>
      </div>


    </div>
  </div>
</body>
</html>
