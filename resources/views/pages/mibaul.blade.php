<!DOCTYPE html>
<html lang="es">

@include('partials._head')
<script src="js/angularmodules/mibaul_module.js"></script>
<body ng-app="baulapp" ng-controller="baulController">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <img src="assets/mexican-woman.png" class="logo-img img-responsive"alt="">
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
  <div class="col-sm-6 col-md-4" ng-repeat="receta in recetasBaul">


  <div class="thumbnail" >
    <img ng-src="<%receta.portada%>" class="img-thumbnail" style="height:15em;"alt="...">
    <div class="caption">
      <h3><%receta.titulo%></h3>
      <!--<p><%receta.descripcion%></p>-->
      <a href="#" class="btn btn-primary" role="button" ng-click="leerReceta(receta.receta_id)">Leer</a>
    </div>
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
