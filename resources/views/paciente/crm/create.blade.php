@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Paciente:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-success" href="{{ route('pacientes.create') }}"><i class="fa fa-plus"></i><strong> Nuevo Paciente</strong></a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-warning" href="{{ route('pacientes.edit', ['paciente' => $paciente]) }}"><i class="fa fa-pencil"></i><strong> Editar Paciente</strong></a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-primary" href="{{ route('pacientes.index') }}"><i class="fa fa-bars"></i><strong> Lista de Pacientes</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">ID de Paciente:</label>
						<dd>{{ $paciente->identificador }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{ $paciente->appaterno }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{ $paciente->apmaterno }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{ $paciente->nombre }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{ $paciente->fecha_nacimiento }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{ $paciente->edad }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{ $paciente->sexo }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-body" style="padding: 0">
				<ul class="nav nav-tabs">
					<li><a href="{{ route('pacientes.show', ['paciente' => $paciente]) }}">Generales:</a></li>
					<li><a href="{{ route('pacientes.historialmedico.index', ['paciente' => $paciente]) }}">Historial Médico:</a></li>
					<li><a href="{{ route('pacientes.historialocular.index', ['paciente' => $paciente]) }}">Historial Ocular:</a></li>
					<li><a href="{{ route('pacientes.anteojos.index', ['paciente' => $paciente]) }}">Anteojos:</a></li>
					<li><a href="{{ route('pacientes.ortopedias.index', ['paciente' => $paciente]) }}">Ortopédico:</a></li>
					<li><a href="{{ route('pacientes.citas.index', ['paciente' => $paciente]) }}">Citas:</a></li>
					<li class="active"><a href="{{ route('pacientes.crms.create', ['paciente' => $paciente]) }}">CRM:</a></li> 
				</ul>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>CRMs:</h5>
					</div>
				</div>
			</div>
		</div>
		<form role="form" method="POST" action="{{ route('pacientes.crms.store', ['paciente' => $paciente]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" id="paciente_id_crm">
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4">
							<label class="control-label" for="fecha_act">Fecha actual:</label>
							<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
						</div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="fecha_aviso">✱Fecha de aviso:</label>
                            <input type="date" class="form-control" id="fecha_aviso" name="fecha_aviso" required="required" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 Months')) }}">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="fecha_cont">✱Fecha de contacto:</label>
                            <input type="date" class="form-control" id="fecha_cont" name="fecha_cont" required="required" min="{{ date('Y-m-d', strtotime('+2 Days')) }}" max="{{ date('Y-m-d', strtotime('+2 Months')) }}">
                        </div>
                    </div>
                    <div class="row">
						<div class="form-group col-sm-4">
							<label class="control-label" for="hora">Hora:</label>
							<input type="text" class="form-control" id="hora" name="hora">
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label" for="tipo_cont">Forma de contacto:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont">
								<option id="Mail" value="Mail">Email/Correo Electronico</option>
								<option value="Telefono">Telefono</option>
								<option value="Cita">Cita</option>
								<option value="Whatsapp">Whatsapp</option>
								<option value="Otro" selected="">Otro</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label" for="status">Estado:</label>
							<select class="form-control" type="select" name="status" id="status">
								<option id="Pendiente" value="Pendiente">Pendiente</option>
								<option id="Cotizando" value="Cotizando">En Cotización</option>
								<option id="Cancelado" value="Cancelado">Cancelado</option>
								<option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
								<option id="Espera" value="Espera">En espera</option>
								<option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
								<option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
								<option id="Entrega" value="Entrega">Para entrega</option>
								<option id="Otro" value="Otro" selected="">Otro</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label class="control-label" for="acuerdos">Acuerdos: </label>
							<textarea class="form-control" rows="5" id="acuerdos" name="acuerdos" maxlength="500"></textarea>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label" for="comentarios">Comentarios: </label>
							<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label" for="observaciones">Observaciones: </label>
							<textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
						</div>
					</div>
				</div>
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="reset" class="btn btn-danger" id="limpiar">
				  				<i class="fa fa-trash"></i> Limpiar
				  			</button>
			  				<button type="button" class="btn btn-warning" id="editar" onclick="edit()" style="display: none;">
				  				<i class="fa fa-pencil"></i> Editar
				  			</button>
			  				<button type="submit" class="btn btn-success" id="guardar">
				  				<i class="fa fa-check"></i> Guardar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="panel-default">
			<div class="panel-body" id="crm_body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($paciente->crms) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
								<tr class="info">
									<th>Fecha contacto</th>
									<th>Fecha aviso</th>
									<th>Hora</th>
									<th>Forma de contacto</th>
									<th>Estado</th>
									<th>Acuerdos</th>
									<th>Observaciones</th>
								</tr>
								@foreach($paciente->crms as $crm)
									<tr onclick="crms({{ $crm }})">
                                        <td>{{ date("d/m/Y", strtotime($crm->fecha_cont)) }}</td>
                                        <td>{{ date("d/m/Y", strtotime($crm->fecha_aviso)) }}</td>
										<td>{{ $crm->hora }}</td>
										<td>{{ $crm->tipo_cont }}</td>
										<td>{{ $crm->status }}</td>
										<td>{{ $crm->acuerdos ? substr($crm->acuerdos, 0, 50) : 'N/A' }}</td>
										<td>{{ $crm->observaciones ? substr($crm->observaciones, 0, 50) : 'N/A' }}</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>No hay CRMs disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	function crms(crm) {
		document.getElementById('limpiar').style.display = 'none';
		document.getElementById('editar').style.display = 'inline';
		document.getElementById('guardar').style.display = 'none';
		$('#fecha_aviso').val(crm.fecha_aviso);
		$('#fecha_cont').val(crm.fecha_cont);
		$('#hora').val(crm.hora);
		$('#tipo_cont').val(crm.tipo_cont);
		$('#status').val(crm.status);
		$('#acuerdos').val(crm.acuerdos);
		$('#comentarios').val(crm.comentarios);
		$('#observaciones').val(crm.observaciones);
		$('#fecha_aviso').prop('disabled', true);
		$('#fecha_cont').prop('disabled', true);
		$('#hora').prop('disabled', true);
		$('#tipo_cont').prop('disabled', true);
		$('#status').prop('disabled', true);
		$('#acuerdos').prop('disabled', true);
		$('#comentarios').prop('disabled', true);
		$('#observaciones').prop('disabled', true);
	}

	function edit() {
		document.getElementById('limpiar').style.display = 'inline';
		document.getElementById('editar').style.display = 'none';
		document.getElementById('guardar').style.display = 'inline';
		$('#fecha_aviso').val('{{ date('Y-m-d') }}');
		$('#fecha_cont').val('{{ date('Y-m-d', strtotime('+2 Days')) }}');
		$('#fecha_aviso').prop('disabled', false);
		$('#fecha_cont').prop('disabled', false);
		$('#hora').prop('disabled', false);
		$('#tipo_cont').prop('disabled', false);
		$('#status').prop('disabled', false);
		$('#acuerdos').prop('disabled', false);
		$('#comentarios').prop('disabled', false);
		$('#observaciones').prop('disabled', false);
	}

</script>

@endsection