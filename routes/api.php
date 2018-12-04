<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/registrarUbicacion','UbicacionController@store');
Route::get('/registrarUbicacion/{id}','UbicacionController@show');
Route::get('/registrarUbicacion/','UbicacionController@showAll');
Route::get('/getTaxis','VisualizarMapa@showTaxiStatus');

//PARA EL PASAJERO
Route::post('registrarPasajero',['as'=>'registrarPasajero','uses'=>'userController@registrarPasajero']);
Route::post('loginPasajero',['as'=>'loginPasajero','uses'=>'userController@loginPasajero']);
Route::post('obtenerToken',['as'=>'obtenerToken','uses'=>'userController@obtenerToken']);
Route::post('notificarChofer',['as'=>'notificarChofer','uses'=>'userController@notificarChofer']);
Route::post('regUbicacionTaxi',['as'=>'regUbicacionTaxi','uses'=>'UbicacionController@regUbicacionTaxi']);
//vladimir
Route::post('updateEstadoChofer',['as'=>'updateEstadoChofer','uses'=>'TaxiController@updateEstadoChofer']);
Route::post('notificarPasajero',['as'=>'notificarPasajero','uses'=>'SolicitudController@notificarPasajero']);