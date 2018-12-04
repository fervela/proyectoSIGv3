<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taxi;
use DB;

class TaxiController extends Controller
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

    public function setToken(Request $request){
        return ["estado" => "hola perros"];
    }

    //SERVICIOS PARA LA APP 
    //vladimir
    public function updateEstadoChofer(Request $request){

        $idusuario = $request->idusuario;
        $estado = $request->estadoC;

        $consulta=DB::select("SELECT taxis.id 
                                FROM taxis,users,chofer_taxi
                                WHERE chofer_taxi.taxi = taxis.id AND
                                      chofer_taxi.chofer = users.id AND
                                      users.id = $idusuario");
        $idtaxi = -1;
        foreach ($consulta as $key => $row) {
            $idtaxi = $row->id;
        }

        $taxi = Taxi::find($idtaxi);
        $taxi->estado = $estado;
        $taxi->update();

        return response()->json(["respuesta"=>"ok","estadoChofer"=>$estado,"update"=>$consulta]);
        
    }
}
