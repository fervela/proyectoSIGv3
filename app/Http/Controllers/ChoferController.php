<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use DB;

class ChoferController extends Controller
{
	public function index(Request $request)
	{
			$query=trim($request->get('searchText'));
			$choferes=DB::table('Users as u')
			->select('*')
			->where('u.name','LIKE','%'.$query.'%')
			->where('u.condicion','=','1')
			->where('u.tipo','=','C')
			->orderBy('u.id','desc')
			->paginate(7);

			return view('Chofer.index',["choferes"=>$choferes,
						"searchText"=>$query]);

	}
	public function create()
	{
		return view("Chofer.create");
	}
	public function store (request $request)
	{
		
		$Users=new User;
		$Users->name=$request->get('name');
		$Users->ci=$request->get('ci');
		$Users->email=$request->get('email');
        $Users->password=bcrypt($request->get('ci'));
		$Users->tipo='C';
		$Users->fechanacimiento=$request->get('fnacimiento');
		$Users->sexo=$request->get('sexo');
		$Users->direccion=$request->get('direccion');
		$Users->telefono=$request->get('telefono');
		$Users->imei=$request->get('imei');
		$Users->nlicencia=$request->get('nlicencia');
		$Users->categoria=$request->get('categoria');
		$Users->fechavencimiento=$request->get('fvencimiento');
		$Users->condicion='1';

		if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/images/perfil/',$file->getClientOriginalName());
            $Users->foto=$file->getClientOriginalName();
        }

		$Users->save();
		return Redirect::to('Chofer');
	}
	public function show($id)
	{
		return view("Chofer.show",["chofer"=>Users::findOrFail($id)]);
	}
	public function edit($id)
	{
		$Users=User::findOrFail($id);
		return view("Chofer.edit",["Users"=>$Users]);
	}
	public function update(request $request, $id)
	{
		$Users=User::findOrFail($id);
		$Users->name=$request->get('name');
		$Users->ci=$request->get('ci');
		$Users->email=$request->get('email');
		$Users->fechanacimiento=$request->get('fnacimiento');
		$Users->sexo=$request->get('sexo');
		$Users->direccion=$request->get('direccion');
		$Users->telefono=$request->get('telefono');
		$Users->imei=$request->get('imei');
		$Users->nlicencia=$request->get('nlicencia');
		$Users->categoria=$request->get('categoria');
		$Users->fechavencimiento=$request->get('fvencimiento');
		$Users->condicion='1';
		$Users->update();
		return Redirect::to('Chofer');
	}
	public function destroy($id)
	{
		$Users=User::findOrFail($id);
		$Users->condicion='0';
		$Users->update();
		return Redirect::to('Chofer');
	}
}
