<div class="modal fade" id="formularioTutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important;">
	<form role="form" method="POST" action="{{ route('pacientes.tutor.store',['paciente'=>$paciente]) }}">
		{{ csrf_field() }}
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-sm-12">
							<h5 class="modal-title" id="exampleModalLongTitle"><strong>Agregar Tutor</strong></h5>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="panel-default">
						<div class="panel-body">
							<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
							<div class="form-group col-xs-4">
								<label class="control-label">Nombre:</label>
								<input class="form-control" type="text" name="nombre">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Apellido Paterno:</label>
								<input class="form-control" type="text" name="appaterno">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Apellido Materno:</label>
								<input class="form-control" type="text" name="apmaterno">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Edad (Automático):</label>
								<input class="form-control" type="text" name="edad" id="edad" readonly>
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Fecha de nacimiento:</label>
								<input class="form-control" type="date" min='1928-01-01' max="{{ date('Y-m-d') }}" name="fecha_nacimiento" id="fecha_nacimiento" style="font-size: 11px">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Sexo:</label>
								<select class="form-control" name="sexo">
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Relación:</label>
								<select class="form-control" name="relacion" id="relacion">
									<option value="Padre">Padre</option>
									<option value="Madre">Madre</option>
									<option value="Tio/Tia">Tio/Tia</option>
									<option value="Abuelo/Abuela">Abuelo/Abuela</option>
									<option value="Hermano/Hermana">Hermano/Hermana</option>
									<option value="Primos">Primos</option>
									<option value="Otros">Otros</option>
								</select>
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Teléfono de Casa:</label>
								<input class="form-control" type="text" name="tel_casa">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Teléfono Celular:</label>
								<input class="form-control" type="text" name="tel_cel">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<strong>Cerrar</strong>
					</button>
					<button type="submit" class="btn btn-success">
						<strong>Agregar</strong>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>