<?php



/*
Aqui estan las rutas a vistas
*/

Route::get('/', function () {
    return view('pages/welcome');
});

Route::get('/categoria', function(){
  return view('pages/categoria');
});

Route::get('/baul', function(){
  return view('pages/baul');
});

Route::get('/subirRecetas', function(){
  return view('pages/subirRecetas');
});

Route::get('/adminPanel', function(){
  return view('pages/adminPanel');
});

/*
Aquí están las rutas a controladores
*/

Route::post('/registerUser', 'UserController@registerUser');
Route::post('/loginUser', 'UserController@loginUser');
Route::post('/getProfiles', 'ProfilesController@getProfiles');
Route::post('/getUsers', 'UserController@getUsers');
Route::post('/changeProfile', 'UserController@changeProfile');

Route::post('/pruebaBD', 'UserController@pruebaBD');
