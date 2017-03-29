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
    #PRUEBA===================================================
    /*public function getAbout() {

      $first = "Alex";
      $last = "Curtis";

      $full = $first . " " . $last;
      return view("page.about")->with("fullname", $full); 

    }   
    */
    #PRUEBA===================================================

    public function registerUser(Request $request)
    {

      /*$correo = $request->input('test');  // <--- POR ESTOS DOS NO SE REALIZABA EL POST!!!!!! AGRHGHRGRHGRHGRHG NO SABÍA
      $pwd = md5($request->input('test'));*/

      $email = Request::input('email');
      $username = Request::input('username');
      $password = Request::input('password');
      

      /*$email = 'dxbox_livegold@hotmail.es';
      $username = 'raygaku';
      $password = 123;*/

      //$queryVerificaEmailRepetido = DB::table('usuarios')->select("SELECT id FROM usuarios WHERE email = '$email'")->get();
      //$queryVerificaUsernameRepetido = DB::table('usuarios')->select("SELECT id FROM usuarios WHERE username = '$username")->get();

      //$queryVerificaEmailRepetido = DB::table('usuarios')->where()->get();
      //$queryVerificaUsernameRepetido = DB::table('usuarios')->where()->get();


      //$queryVerificaEmailRepetido = DB::table('usuarios')->select('id')->where('email', '=', '$email')->get();
      //$queryVerificaUsernameRepetido = DB::table('usuarios')->select('id')->where('username', '=', '$username')->get();

      //$queryVerificaEmailRepetido = DB::select('SELECT id FROM usuarios WHERE email = :email', ['email' => 'hola@.com']);
      //$queryVerificaUsernameRepetido = DB::select('SELECT id FROM usuarios WHERE username = :username', ['username' => 'ray']);

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

    public function pruebaBD(Request $request){

      /*$email = Request::input('email');
      $username = Request::input('username');
      $password = Request::input('password');*/

      //DB::insert("INSERT INTO `usuarios` (`id`, `username`, `password`, `perfil_id`, `email`) VALUES (NULL, 'ray2', '1234', '3', 'yo@yo2.com')");

      //DB::connection();

      /*DB::table('usuarios')->insert(
        ['username' => 'raygakuuu', 'password' => '123456', 'perfil_id' => 3, 'email' => 'john@example.com']
        );*/
      //DB::connection()->getDatabaseName();
      //$query = DB::table('tablaP')->insert(['user' => 1, 'pass' => 2]);


      $users = DB::table('usuarios')->get();
      return 0;




    }

    public function loginUser(Request $request)
    {

      if(DB::connection()->getDatabaseName())
         {

          //$users = DB::table('usuarios')->get();
          return 0;
         }

         return 1;

 
    }


    public function getUsers()
    {
      /*
      Esta funcion trae todos los registros de la tabla 'usuarios'

      */
      $users = DB::table('usuarios')->select('id','username','perfil_id','email')->get();
      return 0;
    }
}
