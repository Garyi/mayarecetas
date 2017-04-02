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
})->middleware('checkProfile');

Route::get('/adminLogin', function(){
  return view('pages/adminLogin');
});

Route::get('/webMasterLogin',function(){
  return view('pages/webMasterLogin');
});

/*
Aquí están las rutas a controladores
*/

Route::post('/registerUser', 'UserController@registerUser');
Route::post('/loginUser', 'UserController@loginUser');
Route::post('/getProfiles', 'ProfilesController@getProfiles');
Route::post('/getUsers', 'UserController@getUsers');
Route::post('/changeProfile', 'UserController@changeProfile');



Route::post('/cerrarSesion', 'UserController@cerrarSesion');
Route::post('/adminLogin', 'UserController@adminLogin');
Route::post('/loginWebMaster', 'UserController@webmasterLogin');

