<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ubicacion;
use App\Taxi;
use App\User;
use App\Solicitud;
class VisualizarMapa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('VMapa.index');
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

    public function showTaxiStatus(){
        $taxi = Taxi::all();
        $dato = array();
        foreach ($taxi as $item) {
            $estado= '';
            $icono = '';
            if($item->estado == 'O'){
                $estado = 'Ocupado';
                $icono = asset('/images/taxi-ocupado.png');
            }else if($item->estado == 'D'){
                $estado = 'Disponible';
                $icono = asset('/images/taxi-libre.png');
            }else if($item->estado == 'F'){
                $estado = 'Fuera de servicio';
                $icono = asset('/images/taxi-fuera.png');
            }

            $ubi = $item->ubicaciones()->orderBy('created_at','desc')->limit(1)->get();
            if(count($ubi)){
                $dato[] = array('taxi'=> asset("images/autos/$item->foto"), 'icono' => $icono, "estado"=> $estado, "position"=>array('lat'=> $ubi[0]->latitud, 'lng' => $ubi[0]->longitud));
            }
        }
        return $dato;
    }
}
