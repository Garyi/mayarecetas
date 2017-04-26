

<!DOCTYPE html>
<html lang="es">

@include('partials._head')
<script src="js/angularmodules/welcome_module.js"></script>
<body ng-app="wapp" ng-controller="MainController"  >
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
      @include('partials._nav')
      </div>
    </div>


      @yield('content')

      @include('partials._footer')




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
