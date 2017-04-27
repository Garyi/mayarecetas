@extends('main')
@section('content')

<script src="js/angularmodules/welcome_module.js"></script>

<main ng-app="wapp" ng-controller="MainController">


    <div class="row">
      <div class="col-md-12">

      </div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="assets/carousel/carousel1.jpg" class="img-carousel" alt="Comida mexicana">
    </div>

    <div class="item">
      <img src="assets/carousel/carousel2.jpg" class="img-carousel" alt="Comida mexicana">
    </div>

    <div class="item">
      <img src="assets/carousel/carousel3.jpg" class="img-carousel" alt="Comida mexicana">
    </div>

    <div class="item">
      <img src="assets/carousel/carousel4.jpg" class="img-carousel" alt="Comida mexicana">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="recetas-section-title">Últimas recetas</h1>
      </div>
    </div>
    <div class="row">
  <div class="col-sm-6 col-md-4"  ng-repeat="receta in todasRecetas">


    <div class="thumbnail" >
      <img src="<%receta.portada%>" class="img-thumbnail" style="height:15em;"alt="...">
      <div class="caption">
        <h3><%receta.titulo%></h3>

        <!--<p><%receta.descripcion%></p>-->
        <a href="#" class="btn btn-primary" role="button" ng-click="leerReceta(receta.id)">Leer</a> <a href="#" class="btn btn-success" role="button" ng-click="guardar(receta.id)">Guardar</a>
      </div>
    </div>





  </div>


</div>
</main>


@endsection
