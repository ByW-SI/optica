<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<h4>C.R.M.: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h4>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<form role="form" method="POST" action="{{ route('pacientes.crm.store', ['paciente' => $paciente]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" id="paciente_id_crm">
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label" for="fecha_act">Fecha Actual:</label>
					<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label" for="fecha_aviso"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha Aviso:</label>
					<input type="date" class="form-control" id="fecha_aviso" name="fecha_aviso" required="" min="{{ date('Y-m-d') }}" max="2030-12-31">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label" for="fecha_cont"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha siguiente contacto:</label>
					<input type="date" class="form-control" id="fecha_cont" name="fecha_cont" required="" min="{{ date('Y-m-d') }}" max="2030-12-31">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label" for="hora"><i class="fa fa-asterisk" aria-hidden="true"></i>Hora:</label>
					<input type="time" min="09:00" max="23:50" class="form-control" id="hora_crm" name="hora"  value="" required="">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label" for="tipo_cont"><i class="fa fa-asterisk" aria-hidden="true"></i>Forma de contacto:</label>
					<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" required="">
						<option value="">Seleccione una Opción</option>
						<option id="Mail" value="Mail">Email/Correo Electronico</option>
						<option value="Telefono">Telefono</option>
						<option value="Cita">Cita</option>
						<option value="Whatsapp">Whatsapp</option>
						<option value="Otro">Otro</option>
					</select>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label" for="status"><i class="fa fa-asterisk" aria-hidden="true"></i>Estado:</label>
					<select class="form-control" type="select" name="status" id="status" required="">
						<option value="">Seleccione una Opción</option>
						<option id="Pendiente" value="Pendiente">Pendiente</option>
						<option id="Cotizando" value="Cotizando">En Cotización</option>
						<option id="Cancelado" value="Cancelado">Cancelado</option>
						<option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
						<option id="Espera" value="Espera">En espera</option>
						<option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
						<option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
						<option id="Entrega" value="Entrega">Para entrega</option>
						<option id="Otro" value="Otro">Otro</option>
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
					<textarea class="form-control" rows="5" id="comentarios_crm" name="comentarios" maxlength="500"></textarea>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label" for="observaciones">Observaciones: </label>
					<textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12 text-center">
					<a class="btn btn-warning" id="limpiarp" onclick="limpiarP()">
						<strong>Limpiar</strong>
					</a>
					<button type="submit" id="submitcrm" class="btn btn-success">
						<strong>Guardar</strong>
					</button>
					<a id="modificarp" class="btn btn-primary" onclick="modificarP()" style="display: none;">
						<strong>Modificar</strong>
					</a>
				</div>
			</div>
		</form>
	</div>
	<div class="panel-body" id="crm_body">
		@if ($paciente->crms->count() ==0)
		<p>Aun no tienes C.R.M.'s</p>
		@endif

		@if ($paciente->crms->count() !=0)
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
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
			<tr onclick="crmP({{ $crm }})" title="Has Click Aquì para ver o modificar" style="cursor: pointer">
				<td>{{ $crm->fecha_cont }}</td>
				<td>{{ $crm->fecha_aviso }}</td>
				<td>{{ $crm->hora }}</td>
				<td>{{ $crm->tipo_cont }}</td>
				<td>{{ $crm->status }}</td>
				<td>{{ substr($crm->acuerdos,0,50) }}...</td>
				<td>{{ substr($crm->observaciones,0,50) }}...</td>
			</tr>
			@endforeach
		</table>
		@endif	
	</div>
</div>