<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/angular/angular.js"></script>
  <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
  <script src="js/angularmodules/controlp_module.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/sweetalert-master/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/admin_styles.css">
  <link rel="stylesheet" href="node_modules/sweetalert-master/dist/sweetalert.css">
</head>
<body ng-app="capp">
  <div class="container-fluid">
   <div class="row admin-h">

    <div class="row">
      <div class="col-md-12 ">
        <img src="assets/manager.png" class="admin-img center-block img-responsive"alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" >
        <h1 class="text-center"> Planel de Control</h1>
      </div>
    </div>
   </div>

<div class="row">
<div class="col-md-2">
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a ui-sref="aprobaciones">Aprobar Recetas<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Control de Usuario <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a ui-sref="perfiles">Administrar Perfiles</a></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Control de Lugares <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a ui-sref="agregarLugares">Agregar Lugares</a></li>
            <li><a ui-sref="eliminarLugares">Eliminar Lugares</a></li>
            <li><a ui-sref="actualizarLugares">Actualizar Lugares</a></li>


          </ul>
        </li>
        <li ><a href="#">Sth<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
        <li ><a href="#">Sth<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div class="col-md-8" ui-view="content">
</div>

  </div>
</div>
</body>
</html>
