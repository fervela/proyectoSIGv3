<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class UbicacionController extends Controller
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
        try {
            $data = Ubicacion::create($request->all());
            return ["estado" => "okey","data" => $data->id];
        } catch (QueryException $e) {
            // dd($e->getMessage());
            return ["estado" => "alex", "msg" => mb_convert_encoding($e->getMessage(), 'UTF-8', 'UTF-8')];
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Ubicacion::findOrFail($id);
            return ["estado" => "okey","data" => $data];
        } catch (QueryException $e) {
            // dd($e->getMessage());
            return ["estado" => "alex", "msg" => mb_convert_encoding($e->getMessage(), 'UTF-8', 'UTF-8')];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showAll()
    {
        try {
            $data = Ubicacion::All();
            return ["estado" => "okey","data" => $data];
        } catch (QueryException $e) {
            // dd($e->getMessage());
            return ["estado" => "alex", "msg" => mb_convert_encoding($e->getMessage(), 'UTF-8', 'UTF-8')];
        }    
    }

    //SERVICIOS PARA LA APP ByAlex

    //ACTUALIZAR UBICAION DEL TAXO
    public function regUbicacionTaxi(Request $request){

        $idusuario = $request->idusuario;
        $latitud = $request->latitud;
        $longitud = $request->longitud;
        $tokenP = $request->tokenPasajero;

        $consulta = DB::select("SELECT taxis.id
                                FROM users,chofer_taxi,taxis
                                WHERE chofer_taxi.taxi = taxis.id AND
                                      chofer_taxi.chofer = users.id AND
                                                                    
                                      users.id = $idusuario ");//chofer_taxi.fechafin > CURDATE() AND
        
        $id = 0;
        foreach ($consulta as $key => $row) {
            $id = $row->id;
            
        }

        $ubicacion_taxi = new Ubicacion();
        $ubicacion_taxi->latitud = $latitud;
        $ubicacion_taxi->longitud = $longitud;
        $ubicacion_taxi->taxi = $id;
        $ubicacion_taxi->velocidad = "50km/h";
        $ubicacion_taxi->save();

        
        if($tokenP !== 'no'){

            $url = 'https://fcm.googleapis.com/fcm/send';


            $fields = array('to' => $tokenP ,
               'notification' => array(
                'body' => 'Bienvenido Alex',
                'title' => 'Alex Dominguez',
                ),
               'data' => array(
                'latChofer' => $latitud,'lngChofer' => $longitud));

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

        }

        

        return response()->json(["respuesta" => "ok"]);
        
    }
}
