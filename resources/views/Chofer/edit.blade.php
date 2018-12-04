@extends('home')
@section('content')
	
	<div class="row">
		<div class="col-lg-12" col-md-6 col-sm-6 col-xs-12>
			<h3>Editar Chofer: {{$Users->name}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($Users,['method'=>'PATCH','route'=>['Chofer.update',$Users->id]])!!}

			
			{!!Form::token()!!}
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label class="nombre">Nombre</label>
				<input value=" {{$Users->name}}" type="text" name="name" class="form-control" placeholder="Nombre..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">ci</label>
				<input type="text" name="ci" value=" {{$Users->ci}}" class="form-control" placeholder="ci..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">email</label>
				<input type="text" name="email" value=" {{$Users->email}}" class="form-control" placeholder="email..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">fecha de nacimiento</label>
				<input type="text" name="fnacimiento" value=" {{$Users->fechanacimiento}}" class="form-control" placeholder="fnacimiento..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">sexo</label>
				<input type="text" name="sexo" value=" {{$Users->sexo}}" class="form-control" placeholder="sexo..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">direccion</label>
				<input type="text" name="direccion" value=" {{$Users->direccion}}" class="form-control" placeholder="direccion..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">telefono</label>
				<input type="text" name="telefono" class="form-control" value=" {{$Users->telefono}}" placeholder="telefono..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">imei</label>
				<input type="text" value=" {{$Users->imei}}" name="imei" class="form-control" placeholder="imei..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">nlicencia</label>
				<input type="text" name="nlicencia" value=" {{$Users->nlicencia}}" class="form-control" placeholder="nlicencia..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">categoria</label>
				<input type="text" name="cateogria" class="form-control" value=" {{$Users->categoria}}" placeholder="categoria..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">fvencimiento</label>
				<input type="text" value=" {{$Users->fechavencimiento}}" name="fvencimiento" class="form-control" placeholder="nlicencia..">
			</div>
		</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}
		</div>
	</div>


@endsection