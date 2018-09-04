@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form id="buscarpaciente" action="busqueda"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				<!-- {{ csrf_field() }} -->
			
				
				<div class="input-group" id="datos1">
					<div class="row">
						<div class="col-sm-9">
							<input type="text" list='browsers' id="paciente" name="query" class="form-control" placeholder="Buscar..." autofocus>
						</div>
						<div class="col-sm-3">
							 <a class="btn btn-info" href="{{ route('pacientes.create')}}">
							        <strong>
							   Agregar Paciente</strong>
							</a>
						</div>
						


				
					</div>
					
				</div>
			</form>
		</div>
	</div>
                   {{-- TABLA AJAX DE CLIENTES --}}
	<div id="datos" name="datos" class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador','Identificador')</th>
					<th>@sortablelink('nombre','Nombre')</th>
					<th>@sortablelink('appaterno','Apellido Paterno')</th>
					<th>@sortablelink('apmaterno','Apellido Materno')</th>
					
					<th>Acciones</th>
				</tr>
			</thead>
			@foreach ($pacientes as $paciente)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$paciente->id}}"
					>
					
					<td>{{$paciente->identificador}}</td>
					<td>{{$paciente->nombre}}</td>
					<td>{{$paciente->appaterno}}</td>
					<td>{{$paciente->apmaterno}}</td>
					
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
						<a class="btn btn-info btn-sm" href="{{ route('pacientes.edit',['paciente'=>$paciente]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
					<strong>Editar</strong>	</a>
					</td>
				</tr>
			@endforeach
		</table>
		{{ $pacientes->links() }}
	</div>
	{{-- TABLA AJAX DE CLIENTES --}}
  </div>

@endsection