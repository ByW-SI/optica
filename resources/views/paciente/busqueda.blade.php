@php($page = app('request')->input('page'))

@isset($page)
    
@extends($page == null ? 'paciente.void' : 'paciente.index')

@else

<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
	<tr class="info">
		<th>@sortablelink('identificador','Identificador')</th>
		<th>@sortablelink('nombre','Nombre')</th>
		<th>@sortablelink('appaterno','Apellido Paterno')</th>
		<th>@sortablelink('apmaterno','Apellido Materno')</th>
		
		<th>Acciones</th>
	</tr>
	@foreach ($pacientes as $paciente)
	<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{$paciente->id}}">
		<td>{{ $paciente->identificador }}</td>
		<td>{{ $paciente->nombre }}</td>
		<td>{{ $paciente->appaterno }}</td>
		<td>{{ $paciente->apmaterno }}</td>
		<td class="text-center">
			<a class="btn btn-primary btn-sm" href="{{ route('pacientes.show', ['paciente'=>$paciente]) }}">
				<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
			</a>
			<a class="btn btn-warning btn-sm" href="{{ route('pacientes.edit', ['paciente'=>$paciente]) }}">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
			</a>
		</td>
	</tr>
	@endforeach
</table>
{{ $pacientes->links() }}

@endisset