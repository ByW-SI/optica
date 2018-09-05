<div class="modal fade"  id="ocular_modal{{$ocular->id}}4"  role="dialog"  style="overflow-y: scroll;">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Anexos y Biomicroscopía</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body" >
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<dd>{{$ocular->anexos}}</dd>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Archivo de Imagen</strong></h5>
			</div>
			<div class="modal-body" >
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<img src="{{asset('storage/'.$ocular->archivo_imagen)}}" width="500px" height="500px">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Tonometría</strong></h5>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Fecha:</label>
								<dd>{{$ocular->fecha_tono}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Hora</label>
								<dd>{{$ocular->hora_tono}}</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Ojo derecho:</label>
								<dd>{{$ocular->tonometria_od}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Ojo Izquierdo</label>
								<dd>{{$ocular->tonometria_oi}}</dd>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
			</div>
		</div>
	</div>
</div>