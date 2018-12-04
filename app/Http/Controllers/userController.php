<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class userController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //SERVICIOS PARA EL PASAJERO

    //Iniciar sesion
    public function loginPasajero(Request $request){

        $email = $request->email;
        $password = $request->password;

        $user = User::where(['email'=>$email,'password'=>$password])->get();
        if(sizeof($user)>0){
            return response()->json(["resp"=>"ok","user"=>$user]);
        }else{
            return response()->json(["resp"=>"no"]);

        }

    }

    //Para el registro del pasajero
    public function registrarPasajero(Request $request){

        $nombre = $request->nombre;
        $email = $request->email;
        $password = $request->password;
        $direccion = $request->direccion;   //opcional
        $telefono = $request->telefono; //opcional
        $sexo = $request->sexo;

        $user = new User();
        $user->nombre = $nombre;
        $user->email = $email;
        $user->password = $password;
        $user->direccion = $direccion;
        $user->telefono = $telefono;
        $user->sexo = $sexo;
        $user->tipo = 'P';
        $user->save();

        return response()->json(["resp"=>"ok","user"=>$user]);
    }

    //obtenerToken de Usuario
    public function obtenerToken(request $request){
        $idusuario=$request->idusuario;
        $token=$request->token;

        $user=User::find($idusuario);
        $user->tokenfirebase=$token;
        $user->save();
        return response()->json(["respuesta"=>"ok","token_actualizado"=>$token]);
    }


  // echo json_encode($datos);
   
   public function diferencia($valor1,$valor2){

        if($valor1 > $valor2){
            return $valor1 - $valor2;
        }
        return $valor2 - $valor1;
   }

   public function distancia($x1,$y1,$x2,$y2){

        $x = $x2 - $x1;
        $y = $y2 - $y1;
        $xx = $x * $x;
        $yy = $y * $y;
        $resultado = sqrt($xx + $yy);
        return $resultado;
   }

   public function notificarChofer(request $request){
        //longitud eje x
        //latitud eje y
        //formula distancia = raiz( (x2-x1)2 + (y2-y1)2 )
        $latOrigen = $request->posicionLatitudeO;
        $lngOrigen = $request->posicionLongitudeO;
        $lngDestino=$request->posicionLongitudeD;
        $latDestino=$request->posicionLatitudeD;

        $tokenPasajero=$request->tokenPasajero;
        $parrilla=$request->parrillaP;
        //$idpasajero=$request->idusuario;

        $nombreP=$request->nombreP;
        $celular = $request->celularP;
        $correro = $request->correoP;

        $email = $nombreP . $celular . rand() ;
        $user = new User();
        $user->nombre = $nombreP;
        $user->email = $email;
        $user->password = '123';
        $user->tipo = 'P';
        $user->sexo = 'D';
        $user->tokenfirebase = $tokenPasajero;
        $user->save();
        $users = User::All();
        $user = $users->last();
        $idpasajero = $user->id;
        ///obtener fecha y hora
        $fecha=date("Y-m-d");
        $hora=date("H:i:s");
        ////aqui inserto cada vez que un pasajero hace una solicitud ///para luego si el chofer acepta///obtener el id e insertar en la tabla solicitud_taxi
        
        $insertar_solicituds=DB::select("INSERT INTO solicituds(fecha,hora,
            origenlatitud,origenlongitud,destinolatitud,destinolongitud,
            pasajerolatitud,pasajerolongitud,tipo,parilla,aire,pasajero) 
        VALUES ('$fecha','$hora','$latOrigen','$lngOrigen','$latDestino','$lngDestino','$latOrigen',
            '$lngOrigen','A','S','S',$idpasajero)");
        $id_solici=null;
        $id_solicitud=DB::select("SELECT id FROM solicituds order by id desc LIMIT 1");
        foreach ($id_solicitud as $key => $row) {
             $id_solici=$row->id;
    
         }
    
        //$user=User::orderby('id','DESC')->take(1)->get();
        //$user= DB::select("SELECT nombre,remember_token FROM `users` WHERE tipo = 'C' LIMIT 1");
        $taxis_disponibles = DB::select("SELECT taxis.id as idtaxi,taxis.aire,taxis.anio,taxis.color,taxis.modelo,taxis.marca,
                                                taxis.nasiento,taxis.npuerta,taxis.parilla,taxis.placa,taxis.tipo,
                                                users.id as iduser,users.nombre,users.nlicencia,users.sexo,users.telefono,users.tokenfirebase,
                                                ubicacions.latitud,ubicacions.longitud
                                        FROM taxis,chofer_taxi,users,ubicacions
                                        WHERE chofer_taxi.taxi = taxis.id AND
                                              chofer_taxi.chofer = users.id AND
                                              ubicacions.taxi = taxis.id AND
                                              taxis.estado = 'D';");
                                        /*
                                        SELECT taxis.id as idtaxi,taxis.aire,taxis.anio,taxis.color,taxis.modelo,taxis.marca,
                                                taxis.nasiento,taxis.npuerta,taxis.parilla,taxis.placa,taxis.tipo,
                                                users.id as iduser,users.nombre,users.nlicencia,users.sexo,users.telefono,users.tokenfirebase,
                                                ubicacions.latitud,ubicacions.longitud

                                        FROM users,taxis,chofer_taxi,ubicacions

                                        WHERE chofer_taxi.taxi = taxis.id AND 
                                                chofer_taxi.chofer = users.id AND
                                                ubicacions.taxi = taxis.id AND
                                                chofer_taxi.estado = 'D'
                                        */
        $disMen = 99999999999999999;
        $chofer = null;
        $token = "";
        foreach ($taxis_disponibles as $key => $row) {
            
            $distancia = $this->distancia($row->longitud,$row->latitud,$lngOrigen,$latOrigen);

            if($distancia<$disMen){
                $disMen = $distancia;
                $chofer = $row;
                $token = $row->tokenfirebase;
                $idtaxi = $row->idtaxi;
            }
        }

 //-------------------------------------------------------------------------------------------------
        try {


        $url = 'https://fcm.googleapis.com/fcm/send';


          $fields = array('to' =>$chofer->tokenfirebase,
           'notification' => array(
            'body' => 'Pasajero nuevo',
            'title' => 'UBERTAXI',
            'sound' => 'defalut',
            ),
           'data' => array(
            'posicionLatO' => $request->posicionLatitudeO,'posicionLonO'=>$request->posicionLongitudeO,
             'posicionLatD'=>$request->posicionLatitudeD,'posicionLonD'=>$request->posicionLongitudeD,
             'tokenPasajero'=>$tokenPasajero,'nombreP'=>$nombreP,'idSolicitud'=>$id_solici,'idtaxi'=>$idtaxi
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
          return response()->json(["respuesta"=>"ok"]);
         } catch (Exception $e) {
            //return "no";
            return response()->json(["respuesta"=>"no"]);
          }

    }

}
