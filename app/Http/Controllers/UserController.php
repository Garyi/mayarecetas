<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use DB;
use Request;


/*
En este controller se van a definir todas las funcionas
que tengan que ver con el Usuario.
*/
class UserController extends Controller
{
    public function registerUser()
    {
      return 0;
    }

    public function loginUser()
    {
      return 0;
    }


    public function getUsers()
    {
      /*
      Esta funcion trae todos los registros de la tabla 'usuarios'

      */
      $users = DB::table('usuarios')->select('id','username','perfil_id','email')->get();
      return $users;
    }
}
