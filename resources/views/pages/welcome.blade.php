@extends('main')
@section('content')

<script src="js/angularmodules/welcome_module.js"></script>

<style media="screen">
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    fieldset, label { margin: 0; padding: 0; }
    body{ margin: 20px; }
    h1 { font-size: 1.5em; margin: 10px; }

    /****** Style Star Rating Widget *****/

    .rating {
    border: none;
    float: left;
    }

    .rating > input { display: none; }
    .rating > label:before {
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
    }

    .rating > .half:before {
    content: "\f089";
    position: absolute;
    }

    .rating > label {
    color: #ddd;
    float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating > input:checked ~ label, /* show gold star when clicked */
    .rating:not(:checked) > label:hover, /* hover current star */
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + label:hover, /* hover current star when changing rating */
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
    </style>



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
        Calificacion dada: <%receta.calificacion%>
        <form>
                    <fieldset class="rating">
                        <input ng-click="enviarCalif(receta.id,5)"    ng-model="receta.calificacion" type="radio" id="<%receta.id%>star5"     name="rating" value="5" />    <label class = "full" for="<%receta.id%>star5"      title="Awesome - 5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,4.5)"  ng-model="receta.calificacion" type="radio" id="<%receta.id%>star4half" name="rating" value="4.5" />  <label class="half"   for="<%receta.id%>star4half"  title="Pretty good - 4.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,4)"    ng-model="receta.calificacion" type="radio" id="<%receta.id%>star4"     name="rating" value="4" />    <label class = "full" for="<%receta.id%>star4"      title="Pretty good - 4 stars"></label>
                        <input ng-click="enviarCalif(receta.id,3.5)"  ng-model="receta.calificacion" type="radio" id="<%receta.id%>star3half" name="rating" value="3.5" />  <label class="half"   for="<%receta.id%>star3half"  title="Meh - 3.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,3)"    ng-model="receta.calificacion" type="radio" id="<%receta.id%>star3"     name="rating" value="3" />    <label class = "full" for="<%receta.id%>star3"      title="Meh - 3 stars"></label>
                        <input ng-click="enviarCalif(receta.id,2.5)"  ng-model="receta.calificacion" type="radio" id="<%receta.id%>star2half" name="rating" value="2.5" />  <label class="half"   for="<%receta.id%>star2half"  title="Kinda bad - 2.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,2)"    ng-model="receta.calificacion" type="radio" id="<%receta.id%>star2"     name="rating" value="2" />    <label class = "full" for="<%receta.id%>star2"      title="Kinda bad - 2 stars"></label>
                        <input ng-click="enviarCalif(receta.id,1.5)"  ng-model="receta.calificacion" type="radio" id="<%receta.id%>star1half" name="rating" value="1.5" />  <label class="half"   for="<%receta.id%>star1half"  title="Meh - 1.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,1)"    ng-model="receta.calificacion" type="radio" id="<%receta.id%>star1"     name="rating" value="1" />    <label class = "full" for="<%receta.id%>star1"      title="Sucks big time - 1 star"></label>
                        <input ng-click="enviarCalif(receta.id,0.5)"  ng-model="receta.calificacion" type="radio" id="<%receta.id%>starhalf"  name="rating" value="0.5" />  <label class="half"   for="<%receta.id%>starhalf"   title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
        </form>


        <a href="#" class="btn btn-primary" role="button" ng-click="leerReceta(receta.id)">Leer</a> <a href="#" class="btn btn-success" role="button" ng-click="guardar(receta.id)">Guardar</a>

      </div>
    </div>





  </div>


  <div class="col-sm-6 col-md-4"  ng-repeat="receta in todasRecetasNC">
    <div class="thumbnail" >
      <img src="<%receta.portada%>" class="img-thumbnail" style="height:15em;"alt="...">
      <div class="caption">
        <h3><%receta.titulo%></h3>

        <!--<p><%receta.descripcion%></p>-->

                    <fieldset class="rating">

                        <input ng-click="enviarCalif(receta.id,5)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star5" name="rating" value="5" /><label class = "full" for="<%receta.id%>star5" title="Awesome - 5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,4.5)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star4half" name="rating" value="4.5" /><label class="half" for="<%receta.id%>star4half" title="Pretty good - 4.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,4)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star4" name="rating" value="4" /><label class = "full" for="<%receta.id%>star4" title="Pretty good - 4 stars"></label>
                        <input ng-click="enviarCalif(receta.id,3.5)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star3half" name="rating" value="3.5" /><label class="half" for="<%receta.id%>star3half" title="Meh - 3.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,3)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star3" name="rating" value="3" /><label class = "full" for="<%receta.id%>star3" title="Meh - 3 stars"></label>
                        <input ng-click="enviarCalif(receta.id,2.5)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star2half" name="rating" value="2.5" /><label class="half" for="<%receta.id%>star2half" title="Kinda bad - 2.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,2)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star2" name="rating" value="2" /><label class = "full" for="<%receta.id%>star2" title="Kinda bad - 2 stars"></label>
                        <input ng-click="enviarCalif(receta.id,1.5)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star1half" name="rating" value="1.5" /><label class="half" for="<%receta.id%>star1half" title="Meh - 1.5 stars"></label>
                        <input ng-click="enviarCalif(receta.id,1)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>star1" name="rating" value="1" /><label class = "full" for="<%receta.id%>star1" title="Sucks big time - 1 star"></label>
                        <input ng-click="enviarCalif(receta.id,0.5)" ng-model="receta.calificacion" type="radio" id="<%receta.id%>starhalf" name="rating" value="0.5" /><label class="half" for="<%receta.id%>starhalf" title="Sucks big time - 0.5 stars"></label>

                    </fieldset>


        <a href="#" class="btn btn-primary" role="button" ng-click="leerReceta(receta.id)">Leer</a> <a href="#" class="btn btn-success" role="button" ng-click="guardar(receta.id)">Guardar</a>

      </div>
    </div>





  </div>


</div>
</main>


@endsection
