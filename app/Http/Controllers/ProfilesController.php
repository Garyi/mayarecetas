<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use DB;
use Request;

/*
En este controlador se encuentran todas las funciones relacionadas a los permisos
*/

class ProfilesController extends Controller
{
    public function getProfiles()
    {
      /*
      Esta funcion trae de la tabla 'perfiles' todos los registros existentes
      */
      $profiles = DB::table('perfiles')->get();
      return $profiles;
    }
}
