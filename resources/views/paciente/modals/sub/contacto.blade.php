<div class="modal-header">
	<h4 class="modal-title" id="exampleModalLongTitle">
		<strong>Lentes de Contacto</strong>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
		</button>
	</h4>
</div>
<div class="modal-body">
	<div class="panel-default">
		<div class="panel-body">
			<div class="row text-center">
				@switch($anteojo->categoria)
				
				@case('COSMÉTICO')
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Tipo de Lentilla</label>
						<dd>{{$anteojo->tipo_lentilla}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Categoría</label>
						<dd>{{$anteojo->categoria}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Modelo</label>
						<dd>{{$anteojo->tipo_cosmetico}}</dd>
					</div>
				</div>
				@break
				@case('ESFÉRICO')
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Tipo de Lentilla</label>
						<dd>{{$anteojo->tipo_lentilla}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Categoría</label>
						<dd>{{$anteojo->categoria}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Tipo de Esférico</label>
						<dd>{{$anteojo->tipo_esferico}}</dd>
					</div>
				</div>
				<br>
				<div class="row">
					@if($anteojo->tipo_esferico == 'DESECHABLES')
					<div class="col-sm-4">
						<label class="control-label">Duración</label>
						<dd>{{$anteojo->duracion}}</dd>
					</div>
					@endif
					<div class="col-sm-4">
						<label class="control-label">Modelo</label>
						<dd>{{$anteojo->diario}}</dd>
						<dd>{{$anteojo->mensual}}</dd>
						<dd>{{$anteojo->anual}}</dd>
					</div>
				</div>
				@break
				@case('TÓRICO')
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Tipo de Lentilla</label>
						<dd>{{$anteojo->tipo_lentilla}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Categoría</label>
						<dd>{{$anteojo->categoria}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Tipo de Tórico</label>
						<dd>{{$anteojo->tipo_torico}}</dd>
					</div>
				</div>
				@if($anteojo->tipo_torico == 'IMPORTADO')
				<br>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Duración</label>
						<dd>{{$anteojo->duracion}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Modelo</label>
						<dd>{{$anteojo->diario}}</dd>
						<dd>{{$anteojo->mensual}}</dd>
						<dd>{{$anteojo->anual}}</dd>
					</div>
				</div>
				@endif
				@break
				@case('MULTIFOCALES')
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Tipo de Lentilla</label>
						<dd>{{$anteojo->tipo_lentilla}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Categoría</label>
						<dd>{{$anteojo->categoria}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Duración</label>
						<dd>{{$anteojo->duracion}}</dd>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Modelo</label>
						<dd>{{$anteojo->diario}}</dd>
						<dd>{{$anteojo->mensual}}</dd>
						<dd>{{$anteojo->anual}}</dd>
					</div>
				</div>
				@break
				@case('PUPILA NEGRA')
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Tipo de Lentilla</label>
						<dd>{{$anteojo->tipo_lentilla}}</dd>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Categoría</label>
						<dd>{{$anteojo->categoria}}</dd>
					</div>
				</div>
				@break
				@default
				NO EXISTE LA INFORMACIÓN.
				
				@endswitch
			</div>
		</div>
	</div>
</div>