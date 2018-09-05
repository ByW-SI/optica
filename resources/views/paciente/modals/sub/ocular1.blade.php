<div class="modal fade"  id="ocular_modal{{$ocular->id}}1"  role="dialog"  style="overflow-y: scroll;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle">
					<strong>Fecha de Cita</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$ocular->created_at}}
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Óperaciones de Documentación:</label>
								<dd>{{$ocular->opciones}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Optometrísta:</label>
								<dd>{{$ocular->optometrista}}</dd>
							</div>
						</div><br>
					</div>
				</div>
			</div>
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle">
					<strong>Cirugías y Padecimientos</strong>
				</h5>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							@if($ocular->cirugias == 'SI')
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Cirugía:</label>
								<dd>{{$ocular->cirug_1}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Tiempo de la Cirugía:</label>
								<dd>{{$ocular->cirug_2}}</dd>	
							</div>
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Tratamiento:</label>
								<dd>{{$ocular->cirug_3}}</dd>	
							</div>
							@else
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Cirugía:</label>
								<dd>NINGUNA</dd>	
							</div>
							@endif
						</div>
						<br>
						<div class="row">
							@if($ocular->padecimientos == 'SI')
							<div class="col-sm-9">
								<label class="control-label" for="apmaterno">Padecimientos:</label>
								<dd>{{$ocular->padecimientos_array}}</dd>
							</div>
							@else
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Padecimientos:</label>
								<dd><dd>NINGUNO</dd></dd>	
							</div>
							@endif
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