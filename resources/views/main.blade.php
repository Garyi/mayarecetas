<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body ng-app="wapp" ng-controller="MainController">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-6">
        <img src="assets/mexican-woman.png" class="logo-img img-responsive"alt="">
        <h1 class="landing-title">El Maya indomable</h1>
        <a href="#" id="gotorecetas"><img src="assets/down-arrow.png" class="img-responsive img-gotorecetas" alt=""></a>
        <p class="gotorecetas-text">Ver las últimas recetas</p>
      </div>
      <div class="col-md-5">
      @include('partials._nav')
      </div>
    </div>


      @yield('content')

      @include('partials._footer')

      @include('partials._modals')



</body>
</html>
