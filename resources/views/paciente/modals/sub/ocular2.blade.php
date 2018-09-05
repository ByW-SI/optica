<div class="modal fade"  id="ocular_modal{{$ocular->id}}2"  role="dialog"  style="overflow-y: scroll;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Problemas Visuales</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Problema Visual:</label>
								<dd>{{$ocular->problema_visual}}</dd><br>
							</div>
							<div class="col-sm-2">
								<label class="control-label" for="apmaterno">Uso de Lentes:</label>
								<dd>{{$ocular->usuario_lentes}}</dd>
							</div>
							@if($ocular->usuario_lentes=='SI')
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Edad a la que usó Lentes:</label>
								<dd>{{$ocular->edad_lentes}}</dd>
							</div>
							@endif
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Molestia a la Luz Solar:</label>
								<dd>{{$ocular->molestia_luz}}</dd>
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label" for="apmaterno">Usuario de Computadora:</label>
								<dd>{{$ocular->usuario_computadora}}</dd>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong> Antecedentes Oculares Familiares</strong></h5>
			</div>
			<div class="modal-body">
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							@if($ocular->antecedente_array==null)
							<div class="col-sm-8">
								<dd>NINGUNO</dd>
							</div>
							@else
							<div class="col-sm-8">
								<dd>{{$ocular->antecedente_array}}</dd><br>
							</div>
							@endif
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