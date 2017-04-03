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


    public function getViewReceta($id)
    {
      session_start();
      $_SESSION['recetaid'] = $id;
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
      session_start();
      $receta = DB::table('recetas')->where('id',$_SESSION['recetaid'])->get();
      return $receta;
    }
}
