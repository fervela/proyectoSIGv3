<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Illuminate\Http\Request;
use DB;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }

    //servicios para la app

    //vladimir
    /////aqui notifico al pasajero si el chofer acepto
    public function notificarPasajero(Request $request){
      
    $tokenPasajero=$request->tokenpasajero;
    $idsolicitud=$request->idsolicitud;
    $idtaxi=$request->idtaxi;
    $idchofer = $request->idchofer;
    $latitud = $request->latitud;
    $longitud = $request->longitud;

    $hora=date("HH:mm");
    $insertar_solicitud_taxi=DB::select("INSERT INTO solicitud_taxi (taxi,solicitud,horainicio,estado,calificacion)
                                         VALUES ($idtaxi,$idsolicitud,'$hora','A',10)");
    
    DB::select("UPDATE taxis SET estado='O' WHERE id=$idtaxi");
     //-------------------------------------------------------------------------------------------------
        try {


        $url = 'https://fcm.googleapis.com/fcm/send';
          $fields = array('to' =>$tokenPasajero,
           'notification' => array(
            'body' => 'Chofer',
            'title' => 'UBERTAXI',
            'sound' => 'defalut',
            ),
           'data' => array(
            'aceptado'=>'yes',
            'latChofer' => $latitud, ' lngChofer' => $longitud
            ));

        define('GOOGLE_API_KEY', 'AIzaSyCNnbFGd4lcF-V9b45IWsWpYav5faI3dJI');

          $headers = array(
                  'Authorization:key='.GOOGLE_API_KEY,
                  'Content-Type: application/json'
          );      

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

          $result = curl_exec($ch);
          if($result === false)
            die('Curl failed ' . curl_error());
          curl_close($ch);
          //return "si";
          return response()->json(["respuesta"=>"ok","res"=>$insertar_solicitud_taxi]);
         } catch (Exception $e) {
            //return "no";
            return response()->json(["respuesta"=>"no"]);
          }

    }
}
