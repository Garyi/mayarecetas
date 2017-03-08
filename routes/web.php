<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
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

Route::get('/aprobarRecetas', function(){
  return view('aprobarRecetas');
});