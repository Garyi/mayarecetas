@extends('main')
@section('content')


  <style type="text/css">
.jumbotron
{
 background: #89D1B5;
min-height: 10px;
color: #FFF;
}


</style>




<div class="container-fluid" ">
<div class="jumbotron">

    <h2 style="text-align: center"><img width="25" height="25" src="assets/arrow-up.png.png"><label></label>Subir Recetas</h2>
        <!--<img style="display: block; margin-left: auto; margin-right: auto" width="50" height="50" src="assets/arrow-up.png.png">-->

</div>
</div>


<div class="container-fluid">
<div class="row">
<div class="col-sm-8">
<form class="form-horizontal">
  <div class="form-group">
    <label for="tituloReceta" class="col-md-1 control-label">Título</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="tituloReceta" placeholder="Título">
    </div>
  </div>
  <div class="form-group">
    <label for="categoriaReceta" class="col-sm-1 control-label">Categoría</label>
    <div class="col-sm-8">
      <select class="form-control">
        <option>Categoría 1</option>
        <option>Categoría 2</option>
        <option>Categoría 3</option>
        <option>Categoría 4</option>
        <option>Categoría 5</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="estadoReceta" class="col-sm-1 control-label">Estado</label>
    <div class="col-sm-8">
      <select class="form-control">
        <option>Yucatán</option>
        <option>Oaxaca</option>
        <option>Nuevo León</option>
        <option>Coahuila</option>
        <option>Aguascalientes</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="descripcionReceta" class="col-sm-1 control-label">Detalles</label>
    <div class="col-sm-8">
      <textarea class="form-control" id="descripcionReceta" placeholder="Descripción..." rows="3"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-info">Subir receta</button>
      <img width="20" height="20" src="assets/upload-image.png">
    </div>

  </div>
</form>

</div>
  <div class="col-sm-4">
    <label class="control-label">Subir Imagen</label>
    <input id="input-1" type="file" class="file">
  </div>
</div>
</div>



@endsection