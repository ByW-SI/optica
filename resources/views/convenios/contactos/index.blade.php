@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div class="panel panel-group">
		@include('convenios.head')
		<ul class="nav nav-tabs">
			<li><a href="{{ route('convenios.show', ['convenio' => $convenio]) }}">Dirección Fisica:</a></li>
			<li><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}">Dirección Fiscal:</a></li>
			<li class="active"><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}">Contacto:</a></li>
			<li><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}">Tipos de Convenios:</a></li>
		</ul>
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Contactos:</h5>
					</div>
					<div class="col-sm-4 text-center">
						<a type="button" class="btn btn-success" href="{{ route('convenios.contactos.create', ['convenio' => $convenio]) }}">
							<i class="fa fa-plus"></i><strong> Agregar Contacto</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				@if(count($contactos) > 0)
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
						<tr class="info">
							<th>Nombre</th>
							<th>Telefono Directo</th>
							<th>Celular</th>
							<th>Correo Electrónico</th>
							<th>Acciones</th>
						</tr>
						@foreach($contactos as $contacto)
							<tr>
								<td>{{ $contacto->nombre }} {{ $contacto->apater }} {{ $contacto->amater }}</td>
								<td>{{ $contacto->telefonodir }}</td>
								<td>{{ $contacto->celular1 }}</td>
								<td>{{ $contacto->email1 }}</td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm" href="{{ route('convenios.contactos.show', ['convenio' => $convenio, 'contacto' => $contacto]) }}">
										<i class="fa fa-eye"></i> Ver
									</a>
									<a class="btn btn-warning btn-sm" href="{{ route('convenios.contactos.edit', ['convenio' => $convenio, 'contacto' => $contacto]) }}">
										<i class="fa fa-pencil"></i> Editar
									</a>
								</td>
							</tr>
						@endforeach
					</table>
				@else
					<h4>No hay contactos disponibles.</h4>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection