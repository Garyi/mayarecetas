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
                <li class="active"><a href="#">Inicio<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
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
    <img src="assets/carousel/carousel1.jpg" alt="...">
    <div class="caption">
      <h3><%receta.titulo%></h3>
      <!--<p><%receta.descripcion%></p>-->
      <a href="#" class="btn btn-primary" role="button" ng-click="leerReceta(receta.receta_id)">Leer</a>
    </div>
  </div>



  </div>
  </div>


  </div>


</body>
