@php($j = 1)
@foreach($paciente->tutores as $tutor)
<form role="form" method="POST" action="{{ route('pacientes.tutor.update',['paciente'=>$paciente,'tutor'=>$tutor]) }}">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
	<div class="modal fade" id="tutor_{{$tutor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-sm-12">
							<h5 class="modal-title" id="exampleModalLongTitle"><strong>Editar Tutor</strong> <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h5>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="panel-default">
						<div class="panel-body">
							<input type="hidden" name="id" value="{{$tutor->id}}">
							<div class="form-group col-xs-4">
								<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Nombre:</label>
								<input class="form-control" type="text" name="nombre" value="{{$tutor->nombre}}" required="">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Apellido Paterno:</label>
								<input class="form-control" type="text" name="appaterno" value="{{$tutor->appaterno}}" required="">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Apellido Materno:</label>
								<input class="form-control" type="text" name="apmaterno" value="{{$tutor->apmaterno}}">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Edad:(Automàtico)</label>
								<input class="form-control" type="text" name="edad" value="{{$tutor->edad}}" readonly id="edad_editar_{{ $j }}">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label" style="font-size: 13px;"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Fecha de nacimiento:</label>
								<input class="form-control" type="date" name="fecha_nacimiento" min='1928-01-01' max="{{ date('Y-m-d') }}" value="{{$tutor->fecha_nacimiento}}" id="fecha_editar_{{ $j }}" style="font-size: 11px">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Sexo:</label>
								<select class="form-control" name="sexo" required="">
									<option value="Masculino"
									<?php if($tutor->sexo == 'Masculino') echo " selected='selected'" ?>
									>Masculino</option>
									<option value="Femenino"
									<?php if($tutor->sexo == 'Femenino') echo " selected='selected'" ?>
									>Femenino</option>
									<option value="Otro"
									<?php if($tutor->sexo == 'Otro') echo " selected='selected'" ?>
									>Otro</option>
								</select>
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Relación:</label>
								<select class="form-control" name="relacion" id="relacion" required="">
									<option value="Padre"
									<?php if($tutor->relacion == 'Padre') echo " selected='selected'" ?>
									>Padre</option>
									<option value="Madre"
									<?php if($tutor->relacion == 'Madre') echo " selected='selected'" ?>
									>Madre</option>
									<option value="Tio/Tia"
									<?php if($tutor->relacion == 'Tio/Tia') echo " selected='selected'" ?>
									>Tio/Tia</option>
									<option value="Abuelo/Abuela"
									<?php if($tutor->relacion == 'Abuelo/Abuela') echo " selected='selected'" ?>
									>Abuelo/Abuela</option>
									<option value="Hermano/Hermana"
									<?php if($tutor->relacion == 'Hermano/Hermana') echo " selected='selected'" ?>
									>Hermano/Hermana</option>
									<option value="Primos"
									<?php if($tutor->relacion == 'Primos') echo " selected='selected'" ?>
									>Primos</option>
									<option value="Otros"
									<?php if($tutor->relacion == 'Otros') echo " selected='selected'" ?>
									>Otros</option>
								</select>
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Teléfono de Casa:</label>
								<input class="form-control" type="text" name="tel_casa" value="{{$tutor->tel_casa}}">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Teléfono Celular:</label>
								<input class="form-control" type="text" name="tel_cel" value="{{$tutor->tel_cel}}" required="">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<strong>Cerrar</strong>
					</button>
					<button type="submit" class="btn btn-success">
						<strong>Guardar</strong>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
@php($j++)
@endforeach