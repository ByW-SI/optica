<div class="modal fade"  id="ocular_modal{{$ocular->id}}3"  role="dialog"  style="overflow-y: scroll;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Revisión Visual</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label" for="apmaterno">A.V. sin Rx. de Lejos (Snellen):</label>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Ojo Derecho:</label>
								<dd>{{$ocular->snellen_1}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Ojo Izquierdo:</label>
								<dd>{{$ocular->snellen_2}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Pantalleo:</label>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Unilateral</label>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Lejos:</label>
								<dd>{{$ocular->unilateral_lejos}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Cerca:</label>
								<dd>{{$ocular->unilateral_cerca}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3 col-sm-offset-3">
								<label class="control-label" for="apmaterno">Alternante</label>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Lejos:</label>
								<dd>{{$ocular->alternamente_lejos}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Cerca:</label>
								<dd>{{$ocular->alternamente_cerca}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Queratometría</label>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Ojo Derecho:</label>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Plana</label>
								<dd>{{$ocular->queratometria_od_plana}}</dd>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Curva</label>
								<dd>{{$ocular->queratometria_od_curva}}</dd>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Eje</label>
								<dd>{{$ocular->queratometria_od_eje}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-2 col-sm-offset-3">
								<label class="control-label" for="apmaterno">Ojo Izquierdo:</label>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Plana</label>
								<dd>{{$ocular->queratometria_oi_plana}}</dd>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Curva</label>
								<dd>{{$ocular->queratometria_oi_curva}}</dd>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Eje</label>
								<dd>{{$ocular->queratometria_oi_eje}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Visión Estereoscópica</label>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Seg / Arco </label>
								<dd>{{$ocular->vision_estereo}}</dd>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Oftalmoscopía</strong></h5>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Parámetros</label>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Ojo Derecho</label>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Ojo Izquierdo</label>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Papila:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->papila_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->papila_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Excavación:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->excavacion_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->excavacion_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Radio:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->radio_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->radio_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Profundidad:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->profundidad_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->profundidad_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Vasos:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->vasos_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->vasos_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Rel. A/V:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->rel_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->rel_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Macula:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->macula_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->macula_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Reflejo:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->reflejo_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->reflejo_oi}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Retina:</label>
							</div>
							<div class="col-sm-3">
								<dd>{{$ocular->retina_od}}</dd>
							</div>
							<div class="col-sm-2">
								<dd>{{$ocular->retina_oi}}</dd>
							</div>
						</div>
						<br>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
			</div>
		</div>
	</div>
</div>