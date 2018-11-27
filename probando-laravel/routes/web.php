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

Route::get('/hola-mundo', function (){
    return view('hola-mundo');
});

Route::post('/hola-mundo', function (){
    return 'Hola Mundo!! por post';
});

Route::get('contacto/{nombre?}/{edad?}', function ($nombre = "William Russell", $edad = null){
    /*return view('contacto', array(
        "nombre" => $nombre
    ));*/

    return view('contacto.contacto')
            ->with('nombre', $nombre)
            ->with('edad', $edad)
            ->with('frutas', array('naranja', 'pera', 'sandia', 'fresa', 'melon', 'piña'));
});


Route::get('/frutas', 'FrutasController@index');
Route::get('/naranjas/{admin?}', [ 'middleware' => 'EsAdmin',
                                   'uses' => 'FrutasController@naranjas',
                                   'as' => 'naranjitas']);
Route::get('/peras', 'FrutasController@peras');

Route::post('/recibir', 'FrutasController@recibirFormulario');


Route::get('notas','NotesController@getIndex');
Route::get('notas/note/{id}','NotesController@getNote');
Route::post('/notas/note', 'NotesController@postNote');
Route::get('notas/save-note', 'NotesController@getSaveNote');
Route::get('/notas/delete-note/{id}', 'NotesController@getDeleteNote');
Route::get('/notas/update-note/{id}', 'NotesController@getUpdateNote');
Route::post('/notas/update-note/{id}', 'NotesController@postUpdateNote');
