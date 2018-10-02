@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div role="application" class="panel panel-group">
		@include('convenios.head')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.show', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Dirección Fisica:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Dirección Fiscal:</a></li>
			<li class="active"><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Tipos de Convenios:</a></li>
		</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Contactos:</h5>
					</div>
					<div class="col-sm-4 text-center">
						<a type="button" class="btn btn-success" href="{{ route('convenios.contactos.create', ['convenio' => $convenio]) }}"><strong>Agregar</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				@if ($contactos->count() == 0)
				<h3>Aún no tienes contactos</h3>
				@else
				<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
					<tr class="info">
						<th>Nombre del contacto</th>
						<th>Telefono Directo</th>
						<th>Celular</th>
						<th>Correo Electronico</th>
						<th>Operaciones</th>
					</tr>
					@foreach ($contactos as $contacto)
					<tr class="active">
						<td>{{ $contacto->nombre }} {{ $contacto->apater }} {{ $contacto->amater }}</td>
						<td>{{ $contacto->telefonodir }}</td>
						<td>{{ $contacto->celular1 }}</td>
						<td>{{ $contacto->email1 }}</td>
						<td class="text-center">
							<a class="btn btn-primary btn-sm" href="{{ route('convenios.contactos.show', ['convenio' => $convenio,'contacto' => $contacto]) }}">
								<strong>Ver</strong>
							</a>
							<a class="btn btn-warning btn-sm" href="{{ route('convenios.contactos.edit', ['convenio' => $convenio,'contacto' => $contacto]) }}">
								<strong>Editar</strong>
							</a>
						</td>
					</tr>
					@endforeach
				</table>
				@endif
		
			</div>
		</div>
	</div>
</div>

		@endsection