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
      //$titulo = "empanadas";
      $lugar = Request::input('lugar');
      $descripcion = Request::input('descripcion');
      $uid = 1;


      DB::insert('INSERT INTO recetas (titulo, lid, descripcion, uid) VALUES (:titulo, :lugar, :descripcion, :uid)', ['titulo' => $titulo, 'lugar' => $lugar, 'descripcion' => $descripcion, 'uid' => $uid]);

      return 0;


    }
}
