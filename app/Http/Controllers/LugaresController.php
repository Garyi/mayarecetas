<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Request;

class LugaresController extends Controller
{
    public function getLugares()
    {
      $lugares = DB::table('lugares')->get();
      return $lugares;
    }

    public function agregarLugar()
    {
      $lugar = Request::input('nombre');
      $query = DB::table('lugares')->insert(
      ['nombre' => $lugar]
      );

      return 1;
    }


    public function eliminarLugar()
    {
      $lid = Request::input('id');
      $query = DB::table('lugares')->where('id', $lid)->delete();
      if($query)
      {
        return 100;
      }
      else{
        return 500;
      }
    }

    public function getLugarEspecifico()
    {
      $lid = Request::input('id');
      $resultado = DB::table('lugares')->where('id', $lid)->get();
      return $resultado;
    }


    public function getViewLugares($id)
    {
      $lugar = DB::table('lugares')->where('id',$id)->get();
      if(count($lugar) != 0)
      {
        return view('pages/verLugar');
      }
      else {
        return view('pages/404');
      }
    }


    public function actualizarLugar()
    {
      $lid = Request::input('id');
      $lnombre = Request::input('nombre');

      $query = DB::table('lugares')->where('id', $lid)->update(
      ['nombre' => $lnombre]);

      if($query)
      {
        return 100;
      }
      else{
        return 500;
      }
    }


    public function getRecetasDelLugar()
    {
      $id = Request::input('id');
      $recetas = DB::table('recetas')
      ->join('lugares','recetas.lugar','=','lugares.id')
      ->select('lugares.id','recetas.id','recetas.titulo','recetas.descripcion','recetas.portada')
      ->where('lugares.id','=',$id)
      ->where('recetas.aprobacion','=',1)
      ->get();

      return $recetas;
    }

    public function getNombresLugares()
    {
      $results = DB::table('lugares')->select('nombre')->get();
      $titulos = array();
      for($i = 0; $i < count($results) ; $i++)
      {
        foreach ($results[$i] as $key => $value) {
            $titulos[] = $value;
        }
      }
      return $titulos;
    }

    public function getLugarID()
    {
      $lugar = Request::input('titulo');
      $id = DB::table('lugares')->select('id')->where('nombre', $lugar)->get();
      return $id;
    }
}
