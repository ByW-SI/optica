<div class="modal fade"  id="ocular_modal{{$ocular->id}}5"  role="dialog"  style="overflow-y: scroll;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row">
					<div class="col-sm-8">
						<h4><strong>Graduación</strong></h4>
					</div>
					<div class="col-sm-4 text-right">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label" for="apmaterno">Ojo Derecho:</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">ESF</label>
						<dd>{{$ocular->esf_od}}</dd>
					</div>
					@if($ocular->cil_od!=null)
						<div class="col-sm-3 form-group">
							<label class="control-label" for="apmaterno">CIL</label>
							<dd>{{$ocular->cil_od}}</dd>
						</div>

						<div class="col-sm-3 form-group">
							<label class="control-label" for="apmaterno">EJE</label>
							<dd>{{$ocular->eje_od}}</dd>
						</div>
					@endif
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">ADD</label>
						<dd>{{$ocular->add_od}}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">AV</label>
						<dd>{{$ocular->av_od}}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">D.N.P. Lejos</label>
						<dd>{{$ocular->dnp_od_lejos}}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">D.N.P. Cerca</label>
						<dd>{{$ocular->dnp_od_cerca}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label" for="apmaterno">Ojo Izquierdo:</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">ESF</label>
						<dd>{{$ocular->esf_oi}}</dd>
					</div>
					@if($ocular->cil_oi!=null)
						<div class="col-sm-3 form-group">
							<label class="control-label" for="apmaterno">CIL</label>
							<dd>{{$ocular->cil_oi}}</dd>
						</div>

						<div class="col-sm-3 form-group">
							<label class="control-label" for="apmaterno">EJE</label>
							<dd>{{$ocular->eje_oi}}</dd>
						</div>
					@endif
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">ADD</label>
						<dd>{{$ocular->add_oi}}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">AV</label>
						<dd>{{$ocular->av_oi}}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">D.N.P. Lejos</label>
						<dd>{{$ocular->dnp_oi_lejos}}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label" for="apmaterno">D.N.P. Cerca</label>
						<dd>{{$ocular->dnp_oi_cerca}}</dd>
					</div>
				</div>
			</div>
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle"><strong>Diagnóstico</strong></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 form-group">
						<label class="control-label" for="apmaterno">Refractivo</label>
						<dd>{{$ocular->refractivo}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<label class="control-label" for="apmaterno">Patológico</label>
						<dd>{{$ocular->patologico}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<label class="control-label" for="apmaterno">Binocularidad</label>
						<dd>{{$ocular->binocularidad}}</dd>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>