<?php

use Illuminate\Support\Facades\Route;

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

Route::get(
    '/', function () {
    return view('layout.home');
}
);

Route::group(
    ['prefix' => 'cliente', 'as' => 'cliente.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ClienteController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'ClienteController@create']);
    Route::post('/store', ['as' => 'store', 'uses' => 'ClienteController@store']);
    Route::get('/edit/{id?}', ['as' => 'edit', 'uses' => 'ClienteController@edit']);
    Route::post('/update/{id}', ['as' => 'update', 'uses' => 'ClienteController@update']);
    Route::post('/update-fast', ['as' => 'update-fast', 'uses' => 'ClienteController@updateFast']);
    Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'ClienteController@destroy']);
}
);
Route::any('cliente-search', ['as' => 'cliente.search', 'uses' => 'ClienteController@searchClient']);

Route::group(
    ['prefix' => 'cidade', 'as' => 'cidade.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'CidadeController@index']);
    Route::get('/incluir', ['as' => 'create', 'uses' => 'CidadeController@create']);
    Route::post('/store', ['as' => 'store', 'uses' => 'CidadeController@store']);
    Route::get('/edit/{id?}', ['as' => 'edit', 'uses' => 'CidadeController@edit']);
    Route::get('/prontuario/{atendimentoId?}', ['as' => 'prontuario', 'uses' => 'CidadeController@prontuario']);
    Route::get('/auto-complete', ['as' => 'auto-complete', 'uses' => 'CidadeController@autoComplete']);
    Route::post('/update/{id}', ['as' => 'update', 'uses' => 'CidadeController@update']);
    Route::post('/update-fast', ['as' => 'update-fast', 'uses' => 'CidadeController@updateFast']);
    Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'CidadeController@destroy']);
}
);
Route::any('cidade-search', ['as' => 'cidade.search', 'uses' => 'CidadeController@searchCity']);

Route::group(
    ['prefix' => 'estado', 'as' => 'estado.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'EstadoController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'EstadoController@create']);
    Route::post('/store', ['as' => 'store', 'uses' => 'EstadoController@store']);
    Route::get('/edit/{id?}', ['as' => 'edit', 'uses' => 'EstadoController@edit']);
    Route::post('/update/{id}', ['as' => 'update', 'uses' => 'EstadoController@update']);
    Route::post('/update-fast', ['as' => 'update-fast', 'uses' => 'ClienteController@updateFast']);
    Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'EstadoController@destroy']);
}
);
Route::any('estado-search', ['as' => 'estado.search', 'uses' => 'EstadoController@searchState']);
