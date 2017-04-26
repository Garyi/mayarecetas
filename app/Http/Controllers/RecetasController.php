<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Request;


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
      $recetas = DB::table('recetas')->where('aprobacion',1)->get();
      return $recetas;
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

}
