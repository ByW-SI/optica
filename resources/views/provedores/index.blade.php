@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form id="empleados" action="buscarempleado"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				<div class="input-group" id="datos1">
					 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
					<input type="text" list='browsers' id="buscarproveedor" name="query" class="form-control" placeholder="Buscar..." autofocus>
				</div>
			</form>
		</div>
	</div>
	<div id="datos" name="datos" class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id', 'Identificador')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
					<th>@sortablelink('alias', 'Alias')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('vendedor', 'Vendedor') </th>
					<th>Operacion</th>
				</tr>
			</thead>

			@foreach($provedores as $provedore)
				<tr class="active">
					<td>{{$provedore->id}}</td>
					<td>
						@if ($provedore->tipopersona == "Fisica")
						{{$provedore->nombre}} {{ $provedore->apellidopaterno }} {{ $provedore->apellidomaterno }}
						@else
						{{$provedore->razonsocial}}
						@endif
					</td>
					<td>{{ $provedore->tipopersona }}</td>
					<td>{{ $provedore->alias }}</td>
					<td>{{ strtoupper($provedore->rfc) }}</td>
					<td>{{$provedore->vendedor}}</td>
					<td>
							<a class="btn btn-success btn-sm" href="{{ route('provedores.show',['provedor'=>$provedore]) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
							<a class="btn btn-info btn-sm" href="{{ route('provedores.edit',['provedor'=>$provedore]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
					</td>
				</tr>
			@endforeach
		</table>
		{{$provedores->links()}}
	</div>
</div>


@endsection