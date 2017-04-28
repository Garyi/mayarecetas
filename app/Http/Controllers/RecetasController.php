<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Request;
use Illuminate\Support\Facades\Log;


class RecetasController extends Controller
{
    public function cargarRecetasAAprobar()
    {
      $recetas = DB::table('recetas')->where('aprobacion', 0)->get();
      return $recetas;
    }


    public function aprobarReceta()
    {
      $id = Request::input('rid');
      $update = DB::table('recetas')->where('id',$id)->update([
        'aprobacion' => 1,
        ]);

      return "ok";
    }


    public function getAllRecetas()
    {
      $recetas = array();
      session_start();
      if(isset($_SESSION['usuario_sesion'])){

        $uid = $_SESSION['usuario_sesion'][0]->id;

        $validacion = DB::select("SELECT receta_id FROM recetas_calificacion WHERE usuario_id = '$uid'");

        if ($validacion == null) { // Si no existe ninguna receta calificada por el usuario

          $receta = DB::table('recetas')->where('aprobacion',1)->get();
          $recetas[] = $receta;
          return $recetas;

        } else {

          $receta = DB::select("SELECT r.id, r.titulo, r.lugar, r.descripcion, r.aprobacion, r.portada, rc.receta_id, rc.usuario_id, rc.calificacion FROM recetas AS r JOIN recetas_calificacion AS rc ON r.id = rc.receta_id WHERE '$uid' = rc.usuario_id AND r.aprobacion = 1");
          $recetaNC = DB::select("SELECT * FROM recetas WHERE aprobacion = 1 AND id NOT IN (SELECT receta_id FROM recetas_calificacion WHERE usuario_id = '$uid')");
          $recetas[] = $receta;
          $recetas[] = $recetaNC;
          return $recetas;
        }

      } else {

        $receta = DB::table('recetas')->where('aprobacion',1)->get();
        $recetas[] = $receta;
        return $recetas;
        //return $receta;
      }
    }


    public function getViewReceta($id)
    {
      $receta = DB::table('recetas')->where('id',$id)->get();
      if(count($receta) != 0)
      {
        return view('pages/verReceta');
      }
      else {
        return view('pages/404');
      }
    }

    public function getRecetaInfo()
    {
      $id = Request::input('id');
      $receta = DB::table('recetas')->where('id',$id)->get();
      return $receta;
    }

    public function subirRecetas() {
      session_start();
      $titulo = Request::input('titulo');
      $lugar = Request::input('lugar');
      $descripcion = Request::input('descripcion');
      $uid = 1;


      DB::insert('INSERT INTO recetas (titulo, lugar, descripcion, uid) VALUES (:titulo, :lugar, :descripcion, :uid)', ['titulo' => $titulo, 'lugar' => $lugar, 'descripcion' => $descripcion, 'uid' => $uid]);

      return 0;
    }


    public function eliminarReceta()
    {
      $id = Request::input('id');
      $query = DB::table('recetas')->where('id',$id)->delete();
      if(!$query)
      {
        return 500;
      }
    }

    public function guardarReceta()
    {
      $rid = Request::input('receta');
      session_start();
      if(isset($_SESSION['usuario_sesion']))
      {
        $uid = $_SESSION['usuario_sesion'][0]->id;
        $select = DB::table('baules')->where('user_id',$uid)->where('receta_id',$rid)->get();
        if(count($select) > 0)
        {
          return 100;
        }
        else {
          $insert = DB::table('baules')->insert([
            'user_id' => $uid,
            'receta_id' => $rid
          ]);
          return 100;
        }

      }
      else {
        return 203;
      }
    }

    public function getRecetasDeBaul()
    {
      session_start();
      $recetas = DB::table('recetas')
      ->join('baules','recetas.id','=','baules.receta_id')
      ->where('baules.user_id', '=', $_SESSION['usuario_sesion'][0]->id)
      ->get();

      return $recetas;
    }

    public function InsertReceta()
    {
      $titulo = $_POST["titulo"];
      $lugar =  $_POST["lugar"];
      $desc = $_POST["descripcion"];

      $today = getdate();
      $file = $_FILES["file"]["name"];
      if(!is_dir("files/"))
      {
        mkdir("files/",0777);
      }

      if($file && move_uploaded_file($_FILES["file"]["tmp_name"], "files/".$file))
      {
        rename("files/".$file, "files/".$today[0].$file);
        $ruta = "files/".$today[0].$file;
        $claveNombre = explode(".",$file);
        $clave = $today[0].$claveNombre[0];

     }

//Query
      $query = DB::table('recetas')->insert(
        [
          'titulo' => $titulo,
          'lugar' => $lugar,
          'descripcion' => $desc,
          'portada' => $ruta
        ]
      );

      return redirect('/subirRecetas');
    }

    public function guardarCalifReceta() {
      session_start();
      if(isset($_SESSION['usuario_sesion'])) {
        //Log::info("SESSION : " . print_r($_SESSION, true));
        //dd($_SESSION)
        $uid = $_SESSION['usuario_sesion'][0]->id;
        $calif = Request::input('rating');
        $rid = Request::input('rid');
        $validacion = DB::select("SELECT * FROM recetas_calificacion WHERE receta_id = '$rid' AND usuario_id = '$uid'");
        if ($validacion == null) {
          DB::insert('INSERT INTO recetas_calificacion (usuario_id, calificacion, receta_id) VALUES (:uid, :calif, :rid)', ['uid' => $uid, 'calif' => $calif, 'rid' => $rid]);
        } else {
          DB::update("UPDATE recetas_calificacion SET calificacion = '$calif' WHERE receta_id = '$rid' AND usuario_id = '$uid'");
        }
        return 0;

      } else {
        return 1;
      }
    }

}
