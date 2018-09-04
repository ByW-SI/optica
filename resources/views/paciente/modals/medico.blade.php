@foreach($paciente->medico as $medico)
<div class="modal fade"  id="medico_modal{{$medico->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle">
					<strong>Datos Médicos</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$medico->created_at}}
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							@if($medico->alergia == 'SI')
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Alergia:</label>
								<dd>{{$medico->cual_alergia}}</dd>
							</div>
							@endif
							@if($medico->tratamiento_alergia != null)
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Tratamiento a Alergia:</label>
								<dd>{{$medico->tratamiento_alergia}}</dd>
							</div>
							@endif
							@if($paciente->sexo == 'Femenino' && $medico->embarazo == 'SI')
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Embarazo/Tiempo:</label>
								<dd>{{$medico->tiempo_embarazo}}</dd>
							</div>
							@endif
						</div>
						<br>
						<div class="row">
							@if($medico->enfermedad == 'SI')
							<div class="col-sm-6">
								<label class="control-label" for="apmaterno">Enfermedades Crónicas:</label>
								<dd>{{$medico->enfermedades_array}},{{$medico->enfermedad_cronica}}</dd>
							</div>
							@endif
							@if($medico->tratamiento=='SI')
							<div class="col-sm-4">
								<label class="control-label" for="apmaterno">Tratamiento Enfermedad Crónica:</label>
								<dd>{{$medico->tratamiento_actual}}</dd>
							</div>
							@endif

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>
				<button type="button" class="btn btn-primary"><strong>Agregar</strong></button>
			</div>
		</div>
	</div>
</div>
@endforeach