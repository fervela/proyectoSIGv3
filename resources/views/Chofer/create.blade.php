@extends('home')
@section('content')
	
	<div class="row">
		<div class="col-lg-12" col-md-6 col-sm-6 col-xs-12>
			<h3>Nuevo Chofer</h3>
			
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'Chofer','method'=>'POST','enctype'=>'multipart/form-data','autocomplete'=>'off')) !!}
			{!!Form::token()!!}

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label class="nombre">Nombre</label>
				<input type="text" name="name" class="form-control" placeholder="Nombre..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">ci</label>
				<input type="text" name="ci" class="form-control" placeholder="ci..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">email</label>
				<input type="text" name="email" class="form-control" placeholder="email..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">fecha de nacimiento</label>
				<input type="date" name="fnacimiento" class="form-control" placeholder="fnacimiento..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">sexo</label>
				<select name="sexo">
					<option value="M">M</option>
					<option value="F">F</option>
				</select>
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">direccion</label>
				<input type="text" name="direccion" class="form-control" placeholder="direccion..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">telefono</label>
				<input type="text" name="telefono" class="form-control" placeholder="telefono..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">imei</label>
				<input type="text" name="imei" class="form-control" placeholder="imei..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">nlicencia</label>
				<input type="text" name="nlicencia" class="form-control" placeholder="nlicencia..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">categoria</label>
				<input type="text" name="categoria" class="form-control" placeholder="categoria..">
			</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label class="ci">fvencimiento</label>
				<input type="date" name="fvencimiento" class="form-control" placeholder="nlicencia..">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label class="imagen">Foto</label>
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