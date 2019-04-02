@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel-body">
	</div>
	<div id="datos" name="datos" class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51, 51, 51); border-collapse: collapse; margin-bottom: 0px">
			<tr class="info">
				<th>@sortablelink('id', 'Identificador')</th>
				<th>@sortablelink('numero_venta', 'Numero de ticket')</th>
				<th>@sortablelink('fecha_generacion', 'Fecha de elaboración')</th>
				<th>@sortablelink('fecha_entrega', 'Fecha de entrega')</th>
				<th>@sortablelink('id_paciente', 'ID Pacienrte')</th>
				<th>Operacion</th>
			</tr>
			@foreach($ordenes as $orden)
			<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{$orden->id}}">
				<td>{{$orden->id}}</td>
				<td>{{ $orden->numero_venta }}</td>
				<td>{{ $orden->fecha_generacion }}</td>
				<td>{{ $orden->fecha_entrega }}</td>
				<td>{{ $orden->id_paciente }}</td>
				<td>
					<a class="btn btn-success btn-sm" href="{{ route('ordenes.show', ['orden'=>$orden]) }}">
						<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
					</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection