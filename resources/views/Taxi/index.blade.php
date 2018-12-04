@extends('home')
@section('content')
	
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3>Listado de Taxis 

					<a href="Taxi/create"><button class="btn btn-success">Nuevo</button></a>  
				</h3>
				@include('Taxi.search')
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Id</th>
							<th>Placa</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Foto</th>
							<th>Opciones</th>
						</thead>
						
						@foreach ($taxis as $c)
						<tr>
							<td>{{$c->id}}</td>
							<td>{{$c->placa}}</td>
							<td>{{$c->marca}}</td>
							<td>{{$c->modelo}}</td>
							<td>
								<img src="{{asset('images/autos/'.$c->foto)}}" 
									 alt="{{$c->placa}}" height="100px" width="100px" class="img-thumbnail">
							</td>
							<td>
								<a href="{{URL::action('TaxiController@edit',$c->id)}}">
									<button class="btn btn-info">Editar</button>
								</a>

								<a href="" data-target="#modal-delete-{{$c->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('Taxi.modal')
						@endforeach
					</table>
				</div>
				{{$taxis->render()}}
			</div>
		</div>

@endsection