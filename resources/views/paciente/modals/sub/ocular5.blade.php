<div class="modal fade"  id="ocular_modal{{$ocular->id}}5"  role="dialog"  style="overflow-y: scroll;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Graduación</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Ojo Derecho:</label>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">ESF</label>
								<dd>{{$ocular->esf_od}}</dd>
							</div>
							@if($ocular->cil_od!=null)
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">CIL</label>
								<dd>{{$ocular->cil_od}}</dd>
							</div>

							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">EJE</label>
								<dd>{{$ocular->eje_od}}</dd>
							</div>
							@endif
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">ADD</label>
								<dd>{{$ocular->add_od}}</dd>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">AV</label>
								<dd>{{$ocular->av_od}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Ojo Izquierdo:</label>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">ESF</label>
								<dd>{{$ocular->esf_oi}}</dd>
							</div>
							@if($ocular->cil_oi!=null)
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">CIL</label>
								<dd>{{$ocular->cil_oi}}</dd>
							</div>

							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">EJE</label>
								<dd>{{$ocular->eje_oi}}</dd>
							</div>
							@endif
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">ADD</label>
								<dd>{{$ocular->add_oi}}</dd>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">AV</label>
								<dd>{{$ocular->av_oi}}</dd>
							</div>
						</div>
						<br>
					</div>
				</div>
			</div>
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Diagnóstico</strong></h5>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-8">
								<label class="control-label" for="apmaterno">Refractivo</label>
								<dd>{{$ocular->refractivo}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-8">
								<label class="control-label" for="apmaterno">Patológico</label>
								<dd>{{$ocular->patologico}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-8">
								<label class="control-label" for="apmaterno">Binocularidad</label>
								<dd>{{$ocular->binocularidad}}</dd>
							</div>
						</div>
						<br>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>