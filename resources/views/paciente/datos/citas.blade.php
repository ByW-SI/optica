<div class="panel-default"  >
	<div class="panel-heading" >
		<div class="row">
			<div class="col-sm-4">
				<h4>Citas: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h4>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<form action="{{ route('pacientes.citas.store', ['paciente' => $paciente]) }}" method="POST">
			{{ csrf_field() }} 
			<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" id="paciente_id">
			<div class="row">
				<div class="col-sm-4 form-group">
					<label class="control-label" for="proxima_cita"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de la cita:</label>
					<input type="date" class="form-control" id="proxima_cita" name="proxima_cita" required min="{{ date('Y-m-d') }}" max="2030-12-31">
				</div>
				<div class="col-sm-4 form-group">
					<label class="control-label" for="hora"><i class="fa fa-asterisk" aria-hidden="true"></i>Hora:</label>
					<input class="form-control" type="time" name="hora" required="">
				</div>
				<div class="col-sm-4 form-group">
					<label class="control-label" for="sucursal_clave"><i class="fa fa-asterisk" aria-hidden="true"></i>Sucursal:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick="getSucursal()"><i class="fa fa-refresh" aria-hidden="true"></i></span>
						<select type="select" name="sucursal_clave" class="form-control" id="sucursal" required>
							<option id="sin_definir" value="sin_definir">Sin Definir</option>
							@foreach ($sucursales as $sucursal)
								<option value="{{ $sucursal->claveid }}">{{ $sucursal->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6 form-group">
					<label class="control-label" for="comentarios">Comentarios/Observaciones:</label>
					<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center form-group">
					<button type="submit" class="btn btn-success">
						<strong>Agregar</strong>
					</button>
				</div>
			</div>
			@include('paciente.datos.tablas.citas')
		</form>
	</div>
</div>