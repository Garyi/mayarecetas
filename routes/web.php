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
})->middleware('checkIfMaster');

Route::get('/adminPanel', function(){
  return view('pages/adminPanel');
})->middleware('checkProfile');

Route::get('/adminAccess', function(){
  return view('pages/adminLogin');
});

Route::get('/webMasterLogin',function(){
  return view('pages/webMasterLogin');
});

Route::get('/404',function(){
  return view('404');
});

Route::get('/miBaulV',function(){
  return view('pages/mibaul');
});

Route::get('/verreceta={id}','RecetasController@getViewReceta');

/*
Aquí están las rutas a controladores
*/

Route::post('/registerUser', 'UserController@registerUser');
Route::post('/loginUser', 'UserController@loginUser');
Route::post('/getProfiles', 'ProfilesController@getProfiles');
Route::post('/getUsers', 'UserController@getUsers');
Route::post('/changeProfile', 'UserController@changeProfile');
Route::post('/subirRecetasC', 'RecetasController@subirRecetas');


Route::post('/cerrarSesion', 'UserController@cerrarSesion');
Route::post('/adminLogin', 'UserController@adminLogin');
Route::post('/loginWebMaster', 'UserController@webmasterLogin');
Route::post('/cargarRecetasAAprobar', 'RecetasController@cargarRecetasAAprobar');
Route::post('/aprobarReceta','RecetasController@aprobarReceta');
Route::post('/getRecetaInfo','RecetasController@getRecetaInfo');
Route::post('/getAllRecetas','RecetasController@getAllRecetas');
Route::post('/eliminarRecetaC','RecetasController@eliminarReceta');
Route::post('/getLugares','LugaresController@getLugares');
Route::post('/agregarLugar','LugaresController@agregarLugar');
Route::post('/eliminarLugar','LugaresController@eliminarLugar');
Route::post('/getLugarEspecifico','LugaresController@getLugarEspecifico');
Route::post('/actualizarLugar','LugaresController@actualizarLugar');
Route::post('/isUserThereC','UserController@isUserThere');
Route::post('/guardarRecetaC','RecetasController@guardarReceta');
Route::post('/getRecetasDeBaulC','RecetasController@getRecetasDeBaul');
