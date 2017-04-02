<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Request;


/*
En este controller se van a definir todas las funcionas
que tengan que ver con el Usuario.
*/
class UserController extends Controller
{

    public function registerUser(Request $request)
    {



      $email = Request::input('email');
      $username = Request::input('username');
      $password = Request::input('password');



      $queryVerificaEmailRepetido = DB::select("SELECT id FROM usuarios WHERE email = '$email'");
      $queryVerificaUsernameRepetido = DB::select("SELECT id FROM usuarios WHERE username = '$username'");





      // Si ambos queries regresan null, es porque la búsqueda no encontró nada y por consiguiente se puede proceder con el registro
      if ($queryVerificaEmailRepetido == null && $queryVerificaUsernameRepetido == null) {
        //$insertar = DB::table('usuarios')->insert("INSERT INTO 'usuarios' (email, username, password) VALUES ('$email', '$username', '$password')");

        /*DB::table('usuarios')->insert(
            ['email' => '$email', 'username' => '$username', 'password' => '$password']
          );*/

        DB::insert('INSERT INTO usuarios (email, username, password, perfil_id) VALUES (:email, :username, :password, :perfil_id )', ['email' => $email, 'username' => $username, 'password' => $password, 'perfil_id' => 3]);

        //DB::insert("INSERT INTO usuarios (username, password, perfil_id, email) VALUES ('$username', $password, 3, '$email' ");

        $a = array($queryVerificaUsernameRepetido, $queryVerificaEmailRepetido);

        return 0; // Éxito

      } elseif ($queryVerificaEmailRepetido == null && $queryVerificaUsernameRepetido =! null) {

        return 2; // Nombre de usuario ya existe

      } elseif ($queryVerificaEmailRepetido =! null && $queryVerificaUsernameRepetido == null) {

        return 3; // Correo ya existe

      }
      elseif ($queryVerificaEmailRepetido =! null && $queryVerificaUsernameRepetido =! null) {

        return 1; // Nombre de usuario y correo ya existen

      }




    }



    public function loginUser()
    {

      session_start();
      $username = Request::input('username');
      $password = Request::input('password');

      $queryVerificaDatos = DB::select("SELECT id FROM usuarios WHERE username = '$username' AND password = '$password'");

      if ($queryVerificaDatos != null) {

        foreach ($queryVerificaDatos as $key => $value) {
          $uid = $value;
        }

        $_SESSION['userid'] = $uid;
        //return response()->json($_SESSION['userid']);
        return 0;
      }
      else {
        return 1;
      }

      return 0;

    }


    public function cerrarSesion() {
      session_start();
      session_destroy();

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

    public function changeProfile()
    {
      /*
      Esta función obtiene como parametros el id del usuario y el id del perfil para cambiar el perfil del usuario seleccionado
      */

      $userid = Request::input('userid');
      $permiso = Request::input('permiso');

      $change = DB::table('usuarios')->where("id", $userid)->update([
         'perfil_id' => $permiso,
        ]);

        if($change)
        {
          return 0;
        }
        else {
          return 1;
        }


    }
}
