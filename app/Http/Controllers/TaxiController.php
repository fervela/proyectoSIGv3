<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Taxi;
use App\User;
use DB;

class TaxiController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        
            $query=trim($request->get('searchText'));
            $taxis=DB::table('taxis as t')
            ->select('*')
            ->where('t.placa','LIKE','%'.$query.'%')
            ->where('t.condicion','=','1')
            ->orderBy('t.id','desc')
            ->paginate(7);
            return view('Taxi.index',["taxis"=>$taxis,
                        "searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        $propietario=DB::table('Users')
               ->where('condicion','=','1')
               ->where('tipo','=','P')
               ->get();
        $chofer=DB::table('Users')
               ->where('condicion','=','1')
               ->where('tipo','=','C')
               ->get();
        return view("Taxi.create",["propietario"=>$propietario,"chofer"=>$chofer]);
    }
    public function store (request $request)
    {
        
        $Taxi=new Taxi;
        $Taxi->placa=$request->get('placa');
        $Taxi->marca=$request->get('marca');
        $Taxi->modelo=$request->get('modelo');
        $Taxi->anio=$request->get('anio');
        $Taxi->color=$request->get('color');
        $Taxi->tipo=$request->get('tipo');
        $Taxi->nasiento=$request->get('nasiento');
        $Taxi->npuerta=$request->get('npuerta');
        $Taxi->parilla=$request->get('parilla');
        $Taxi->aire=$request->get('aire');
        $Taxi->propietario=$request->get('idp');
        $Taxi->condicion='1';

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/images/autos/',$file->getClientOriginalName());
            $Taxi->foto=$file->getClientOriginalName();
        }
        $placa=$request->get('placa');
        $Taxi->save();
        
        $chofer=$request->get('idc');
        $id;

        $taxi=DB::table('taxis')
            ->select('*')
            ->where('placa','=',$placa)
            ->get();

        foreach ($taxi as $key => $value) {
            $id=$value->id;
        }
      
        DB::insert("INSERT INTO chofer_taxi(taxi,chofer,fechainicio,fechafin) VALUES(?,?,?,?) ",[$id,$chofer,null,null]); 

        return Redirect::to('Taxi');
    }
    public function show($id)
    {
        return view("Taxi.show",["chofer"=>Taxi::findOrFail($id)]);
    }
    public function edit($id)
    {

        $Taxi=Taxi::findOrFail($id);
        $propietario=DB::table('Users')
               ->where('condicion','=','1')
               ->where('tipo','=','P')
               ->get();
        $chofer=DB::table('Users')
               ->where('condicion','=','1')
               ->where('tipo','=','C')
               ->get();
        return view("Taxi.edit",["Taxi"=>$Taxi,"propietario"=>$propietario,"chofer"=>$chofer]);
    }
    public function update(request $request, $id)
    {
        $Taxi=Taxi::findOrFail($id);
        $Taxi->placa=$request->get('placa');
        $Taxi->marca=$request->get('marca');
        $Taxi->modelo=$request->get('modelo');
        $Taxi->anio=$request->get('fnamarcamiento');
        $Taxi->color=$request->get('color');
        $Taxi->tipo=$request->get('tipo');
        $Taxi->nasiento=$request->get('nasiento');
        $Taxi->npuerta=$request->get('npuerta');
        $Taxi->parilla=$request->get('parilla');
        $Taxi->aire=$request->get('aire');
        $Taxi->propietario=$request->get('idp');

        if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/autos/',$file->getClientOriginalName());
            $Taxi->foto=$file->getClientOriginalName();
        }
        $Taxi->update();
        return Redirect::to('Taxi');
    }
    public function destroy($id)
    {
        $Taxi=Taxi::findOrFail($id);
        $Taxi->condicion='0';
        $Taxi->update();
        return Redirect::to('Taxi');
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
