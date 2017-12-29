@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form id="empleados" action="buscarempleado"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				<div class="input-group" id="datos1">
					 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
					<input type="text" list='browsers' id="buscarempleado" name="query" class="form-control" placeholder="Buscar..." autofocus>
				</div>
			</form>
		</div>
	</div>
	<div id="datos" name="datos" class="jumbotron">
		{{-- TABLA AJAX --}}
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador','#')</th>
					<th>@sortablelink('nombre','Nombre')</th>
					<th>@sortablelink('appaterno','Apellido Paterno')</th>
					<th>@sortablelink('apmaterno','Apellido Materno')</th>
					<th>@sortablelink('rfc','R.F.C.')</th>
					<th>Acciones</th>
				</tr>
			</thead>
			@foreach ($empleados as $empleado)
				{{-- expr --}}
				<tr class="active">
					
					<td>{{$empleado->identificador}}</td>
					<td>{{$empleado->nombre}}</td>
					<td>{{$empleado->appaterno}}</td>
					<td>{{$empleado->apmaterno}}</td>
					<td>{{$empleado->rfc}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('empleados.show',['empleado'=>$empleado]) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('empleados.edit',['empleado'=>$empleado]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
					</td>
				</tr>
			@endforeach
		</table>
		{{$empleados->appends(Request::all())->links()}}
	</div>
</div>
@endsection