<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
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
}
