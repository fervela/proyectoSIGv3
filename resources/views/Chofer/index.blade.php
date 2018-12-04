@extends('home')
@section('content')
	
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3>Listado de Choferes 

					<a href="Chofer/create"><button class="btn btn-success">Nuevo</button></a>  
				</h3>
				@include('Chofer.search')
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Id</th>
							<th>Nombre</th>
							<th>ci</th>
							<th>email</th>
							<th>Foto</th>
							<th>Opciones</th>
						</thead>
						
						@foreach ($choferes as $c)
						<tr>
							<td>{{$c->id}}</td>
							<td>{{$c->name}}</td>
							<td>{{$c->ci}}</td>
							<td>{{$c->email}}</td>
							<td>
								<img src="{{asset('images/perfil/'.$c->foto)}}" 
									 alt="{{$c->name}}" height="100px" width="100px" class="img-thumbnail">
							</td>
							<td>
								<a href="{{URL::action('ChoferController@edit',$c->id)}}">
									<button class="btn btn-info">Editar</button>
								</a>

								<a href="" data-target="#modal-delete-{{$c->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('Chofer.modal')
						@endforeach
					</table>
				</div>
				{{$choferes->render()}}
			</div>
		</div>

@endsection