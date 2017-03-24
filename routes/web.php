<?php



/*
Aqui estan las rutas a vistas
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categoria', function(){
  return view('categoria');
});

Route::get('/baul', function(){
  return view('baul');
});

Route::get('/subirRecetas', function(){
  return view('subirRecetas');
});

Route::get('/adminPanel', function(){
  return view('adminPanel');
});

/*
Aquí están las rutas a controladores
*/

Route::post('/registerUser', 'UserController@registerUser');
Route::post('/loginUser', 'UserController@loginUser');
