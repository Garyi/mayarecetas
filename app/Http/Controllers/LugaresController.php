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
}
