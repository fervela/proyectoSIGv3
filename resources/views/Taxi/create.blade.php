@extends('home')
@section('content')
	
	<div class="row">
		<div class="col-lg-12" col-md-6 col-sm-6 col-xs-12>
			<h3>Nuevo Taxi</h3>
			
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'Taxi','method'=>'POST','enctype'=>'multipart/form-data','autocomplete'=>'off')) !!}

			{!!Form::token()!!}

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label class="nombre">Placa</label>
				<input type="text" name="placa" class="form-control" placeholder="Nombre..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">Marca</label>
				<input type="text" name="marca" class="form-control" placeholder="ci..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">Modelo</label>
				<input type="text" name="modelo" class="form-control" placeholder="email..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">anio</label>
				<input type="date" name="anio" class="form-control" placeholder="fnacimiento..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">color</label>
				<input type="text" name="color" class="form-control" placeholder="sexo..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">tipo</label>
				<input type="text" name="tipo" class="form-control" placeholder="direccion..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">nasiento</label>
				<input type="text" name="nasiento" class="form-control" placeholder="telefono..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">npuerta</label>
				<input type="text" name="npuerta" class="form-control" placeholder="imei..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">parrilla</label>
				<select name="parilla">
					<option value="S">S</option>
					<option value="N">N</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">aire</label>
				<select name="aire">
					<option value="S">S</option>
					<option value="N">N</option>
				</select>
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<label>Propietario</label>	
			<select name="idp" class="form-control">
					@foreach($propietario as $u)
						<option value="{{$u->id}}">{{$u->name}}</option>
					@endforeach
				</select>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<label>Chofer</label>	
			<select name="idc" class="form-control">
					@foreach($chofer as $c)
						<option value="{{$c->id}}">{{$c->name}}</option>
					@endforeach
				</select>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label class="imagen">Imagen</label>
				<input type="file" name="imagen" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>	
			{!!Form::close()!!}
		</div>
	</div>


@endsection