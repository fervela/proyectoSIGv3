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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('visualizarMapa','VisualizarMapa');

Route::get('/servicio',function(){
    // phpinfo();
    // ini_set('soap.wsdl_cache_enabled',0);
    // ini_set('soap.wsdl_cache_ttl',0);
    $opts = array(
        'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false)
    );
    $params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_2, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts) );
    // $url = "http://190.171.244.211:8080/WebSPedirTaxi/wsPT.asmx?WSDL";
    $url = "http://190.171.244.211:8080/WebSPedirTaxi/wsPT.asmx?WSDL";
    // $url = "http://www.webservicex.net/globalweather.asmx?WSDL";
   try{
        $client = new SoapClient($url,$params);
        // $client->PTPRO_obtenerPropietario();
    }
    catch(SoapFault $fault) {
        dd($fault);
    }
    // return $client->PTCHO_obtenerChofer(); 
});

