@extends('home')
@section('content')
	
	<div class="row">
		<div class="col-lg-12" col-md-6 col-sm-6 col-xs-12>
			<h3>Editar taxi: {{$Taxi->marca}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($Taxi,['method'=>'PATCH','route'=>['Taxi.update',$Taxi->id]])!!}

			
			{!!Form::token()!!}
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label class="nombre">placa</label>
				<input value=" {{$Taxi->placa}}" type="text" name="placa" class="form-control" placeholder="Nombre..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">marca</label>
				<input type="text" name="marca" value=" {{$Taxi->marca}}" class="form-control" placeholder="ci..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">modelo</label>
				<input type="text" name="modelo" value=" {{$Taxi->modelo}}" class="form-control" placeholder="email..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">anio</label>
				<input type="date" name="anio" value=" {{$Taxi->anio}}" class="form-control" placeholder="fnacimiento..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">color</label>
				<input type="text" name="color" value=" {{$Taxi->color}}" class="form-control" placeholder="sexo..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">tipo</label>
				<input type="text" name="tipo" value=" {{$Taxi->tipo}}" class="form-control" placeholder="direccion..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">nasiento</label>
				<input type="text" name="nasiento" class="form-control" value=" {{$Taxi->nasiento}}" placeholder="telefono..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">npuerta</label>
				<input type="text" value=" {{$Taxi->npuerta}}" name="npuerta" class="form-control" placeholder="imei..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">parrilla</label>
				<input type="text" name="parilla" value=" {{$Taxi->parilla}}" class="form-control" placeholder="nlicencia..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">aire</label>
				<input type="text" name="aire" value=" {{$Taxi->aire}}" class="form-control" placeholder="categoria..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">foto</label>
				<input type="file" name="foto" class="form-control" placeholder="categoria..">
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
		
		<div clas
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}
		</div>
	</div>


@endsection