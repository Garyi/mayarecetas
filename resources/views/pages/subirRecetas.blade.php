
<!DOCTYPE html>
<html lang="en">

@include('partials._head')



<div class="container-fluid" >
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
      <input ng-model="receta.titulo" type="text" class="form-control" id="tituloReceta" placeholder="Título">
    </div>
  </div>
  <div class="form-group">
    <label for="categoriaReceta" class="col-sm-1 control-label">Categoría</label>
    <div class="col-sm-8">
      <select ng-model="receta.categoria" class="form-control">
        <option value="1">Categoría 1</option>
        <option value="2">Categoría 2</option>
        <option value="3">Categoría 3</option>
        <option value="4">Categoría 4</option>
        <option value="5">Categoría 5</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="estadoReceta" class="col-sm-1 control-label">Estado</label>
    <div class="col-sm-8">
      <select ng-model="receta.estado" class="form-control">
        <option value="Yucatán">Yucatán</option>
        <option value="Oaxaca">Oaxaca</option>
        <option value="Nuevo León">Nuevo León</option>
        <option value="coahuila">Coahuila</option>
        <option value="Aguascalientes">Aguascalientes</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="descripcionReceta" class="col-sm-1 control-label">Descripción</label>
    <div class="col-sm-8">
      <textarea ng-model="receta.descripcion" class="form-control"  id="descripcionReceta" placeholder="Descripción..." rows="20"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button ng-click="subirReceta()" type="submit" class="btn btn-info">Subir receta</button>
      <img width="20" height="20" src="assets/upload-image.png" style="display:none;">
    </div>

  </div>
</form>

</div>
  <div class="col-sm-4" style="display:none ">
    <label class="control-label">Subir Imagen</label>
    <input id="input-1" type="file" class="file">
  </div>
</div>
</div>



</body>
</html>
