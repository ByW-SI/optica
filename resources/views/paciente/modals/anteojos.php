<div class="modal fade"  id="anteojo_modal{{$anteojo->id}}"  role="dialog"  style="overflow-y: scroll;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			@switch($anteojo->tipo_anteojo)
			@case('ARMAZÓN')
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Lentes de Armazón</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body" >
				<div class="panel-default">
					<div class="panel-body">
						@switch($anteojo->tipo_lente)
						@case('MONOFOCAL')
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tipo de Lentes</label>
								<dd>{{$anteojo->tipo_lente}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Tipo de Monofocal</label>
								<dd>{{$anteojo->monofocal}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Material</label>
								<dd>{{$anteojo->monofocal_material}}</dd>
							</div>
							@if($anteojo->monofocal_material=='BÁSICO')
							<div class="col-sm-3">
								<label class="control-label">Material Báscio</label>
								<dd>{{$anteojo->monofocal_material_basico}}</dd>
							</div>
							@else
							<div class="col-sm-3">
								<label class="control-label">Material Premium</label>
								<dd>{{$anteojo->monofocal_material_premium}}</dd>
							</div>
							@endif
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tratamiento</label>
								<dd>{{$anteojo->tratamiento}}</dd>
							</div>
							@if($anteojo->tratamiento=='SI')

							<div class="col-sm-3">
								<label class="control-label">Antirreflejante</label>	
								<dd>{{$anteojo->anti_basico}}{{$anteojo->anti_premium}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Fotocromático</label>
								<dd>{{$anteojo->foto_basico}}{{$anteojo->foto_premium}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Polarizado</label>
								<dd>{{$anteojo->polarizado_basico}}{{$anteojo->polarizado_premium}}</dd>
							</div>	

							@else

							@endif
						</div>
						@break
						@case('BIFOCAL')
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tipo de Lentes</label>
								<dd>{{$anteojo->tipo_lente}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Tipo de Bifocal</label>
								<dd>{{$anteojo->bifocal}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Material</label>
								<dd>{{$anteojo->bifocal_flat_material}} 
									@if($anteojo->bifocal_blend_material=='NO')

									@else
									CR-39 W
									@endif

								</dd>
							</div>
						</div>
						<br>
						<div class="row">
							@if($anteojo->tratamiento_flat=='SI')
							<div class="col-sm-3">
								<label class="control-label">Tratamientos:</label>
								<dd>{{$anteojo->monofocal_material_basico}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Antirreflejante Básico</label>
								<dd>{{$anteojo->tratamiento_flat_antirreflejante_basico}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Fotocromático Básico</label>
								<dd>{{$anteojo->tratamiento_flat_fotocromatico_basico}}</dd>
							</div>
							@elseif($anteojo->tratamiento_blend=='SI')
							<div class="col-sm-3">
								<label class="control-label">Tratamientos:</label>
								<dd>{{$anteojo->monofocal_material_basico}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Antirreflejante Básico</label>
								<dd>{{$anteojo->tratamiento_blend_basico}}</dd>
							</div>

							@endif
						</div>
						<br>
						@break
						@case('PROGRESIVO')
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tipo de Lentes</label>
								<dd>{{$anteojo->tipo_lente}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Tipo de Progresivo</label>
								<dd>{{$anteojo->progresivo}}</dd>
							</div>
							@isset($anteojo->progresivo_premium_kodak)
							<div class="col-sm-3">
								<label class="control-label">KODAK</label>
								<dd>{{$anteojo->progresivo_premium_kodak}}</dd>
							</div>
							@endisset
							<div class="col-sm-3">
								<label class="control-label">Material</label>
								<dd>{{$anteojo->progresivo_basico_material}} 
									{{$anteojo->progresivo_premium_material}} 
								</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tratamiento:</label>
								<dd>{{$anteojo->tratamiento_progresivo_basico}}{{$anteojo->tratamiento_progresivo_premium}}</dd>
							</div>
							@if($anteojo->tratamiento_progresivo_basico == 'SI'||$anteojo->tratamiento_progresivo_premium == 'SI')
							<div class="col-sm-3">
								<label class="control-label">Antirreflejante</label>
								<dd>@if($anteojo->tratamiento_progresivo_basico_antirreflejante == 'NO')
									@else
									{{$anteojo->tratamiento_progresivo_basico_antirreflejante}}
									@endif
									{{$anteojo->anti_premium_progresivo}}
								</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Fotocromático</label>
								<dd>@if($anteojo->tratamiento_progresivo_basico_fotocromatico == 'NO')
									@else
									{{$anteojo->tratamiento_progresivo_basico_fotocromatico}}
									@endif
									{{$anteojo->foto_premium_progresivo}}
								</dd>
							</div>
							@endif
						</div>
						@break
						@default
						DEFAULT CASE
						@endswitch
					</div>
				</div>
			</div>
			@break
			@case('LENTES DE CONTACTO')
			<div class="modal-header jumbotron" style="margin: 0;">
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
							<div class="col-sm-3">
								<label class="control-label">Tipo de Lentilla</label>
								<dd>{{$anteojo->tipo_lentilla}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Categoría</label>
								<dd>{{$anteojo->categoria}}</dd>
							</div>
							@if($anteojo->tipo_cosmetico != null)
							<div class="col-sm-3">
								<label class="control-label">Tipo Cosmético</label>
								<dd>{{$anteojo->tipo_cosmetico}}</dd>
							</div>
							@elseif($anteojo->tipo_esferico != null)
							<div class="col-sm-3">
								<label class="control-label">Tipo Esférico</label>
								<dd>{{$anteojo->tipo_esferico}}</dd>
							</div>
							@elseif($anteojo->tipo_torico != null)
							<div class="col-sm-3">
								<label class="control-label">Tipo Tórico</label>
								<dd>{{$anteojo->tipo_torico}}</dd>
							</div>
							@endif
							@if($anteojo->tipo_esferico != null || $anteojo->tipo_torico != null)
							<div class="col-sm-3">
								<label class="control-label">Duración</label>
								<dd>{{$anteojo->duracion}}</dd>
							</div>
							@endif
							@if($anteojo->diario != null)
							<div class="col-sm-3">
								<label class="control-label">Lentes de Contacto</label>
								<dd>{{$anteojo->diario}}</dd>
							</div>
							@elseif($anteojo->mensual != null)
							<div class="col-sm-3">
								<label class="control-label">Lentes de Contacto</label>
								<dd>{{$anteojo->mensual}}</dd>
							</div>
							@elseif($anteojo->anual != null)
							<div class="col-sm-3">
								<label class="control-label">Lentes de Contacto</label>
								<dd>{{$anteojo->anual}}</dd>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			@break
			@case('AMBOS')
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Lentes de Armazón</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
			</div>
			<div class="modal-body" >
				<div class="panel-default">
					<div class="panel-body">
						@switch($anteojo->tipo_lente)
						@case('MONOFOCAL')
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tipo de Lentes</label>
								<dd>{{$anteojo->tipo_lente}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Tipo de Monofocal</label>
								<dd>{{$anteojo->monofocal}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Material</label>
								<dd>{{$anteojo->monofocal_material}}</dd>
							</div>
							@if($anteojo->monofocal_material=='BÁSICO')
							<div class="col-sm-3">
								<label class="control-label">Material Báscio</label>
								<dd>{{$anteojo->monofocal_material_basico}}</dd>
							</div>
							@else
							<div class="col-sm-3">
								<label class="control-label">Material Premium</label>
								<dd>{{$anteojo->monofocal_material_premium}}</dd>
							</div>
							@endif
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tratamiento</label>
								<dd>{{$anteojo->tratamiento}}</dd>
							</div>
							@if($anteojo->tratamiento=='SI')

							<div class="col-sm-3">
								<label class="control-label">Antirreflejante</label>	
								<dd>{{$anteojo->anti_basico}}{{$anteojo->anti_premium}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Fotocromático</label>
								<dd>{{$anteojo->foto_basico}}{{$anteojo->foto_premium}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Polarizado</label>
								<dd>{{$anteojo->polarizado_basico}}{{$anteojo->polarizado_premium}}</dd>
							</div>	

							@else

							@endif
						</div>
						@break
						@case('BIFOCAL')
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tipo de Lentes</label>
								<dd>{{$anteojo->tipo_lente}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Tipo de Bifocal</label>
								<dd>{{$anteojo->bifocal}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Material</label>
								<dd>{{$anteojo->bifocal_flat_material}} 
									@if($anteojo->bifocal_blend_material=='NO')

									@else
									CR-39 W
									@endif

								</dd>
							</div>
						</div>
						<br>
						<div class="row">
							@if($anteojo->tratamiento_flat=='SI')
							<div class="col-sm-3">
								<label class="control-label">Tratamientos:</label>
								<dd>{{$anteojo->monofocal_material_basico}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Antirreflejante Básico</label>
								<dd>{{$anteojo->tratamiento_flat_antirreflejante_basico}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Fotocromático Básico</label>
								<dd>{{$anteojo->tratamiento_flat_fotocromatico_basico}}</dd>
							</div>
							@elseif($anteojo->tratamiento_blend=='SI')
							<div class="col-sm-3">
								<label class="control-label">Tratamientos:</label>
								<dd>{{$anteojo->monofocal_material_basico}}</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Antirreflejante Básico</label>
								<dd>{{$anteojo->tratamiento_blend_basico}}</dd>
							</div>

							@endif
						</div>
						<br>
						@break
						@case('PROGRESIVO')
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tipo de Lentes</label>
								<dd>{{$anteojo->tipo_lente}}</dd>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Tipo de Progresivo</label>
								<dd>{{$anteojo->progresivo}}</dd>
							</div>
							@isset($anteojo->progresivo_premium_kodak)
							<div class="col-sm-3">
								<label class="control-label">KODAK</label>
								<dd>{{$anteojo->progresivo_premium_kodak}}</dd>
							</div>
							@endisset
							<div class="col-sm-3">
								<label class="control-label">Material</label>
								<dd>{{$anteojo->progresivo_basico_material}} 
									{{$anteojo->progresivo_premium_material}} 
								</dd>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tratamiento:</label>
								<dd>{{$anteojo->tratamiento_progresivo_basico}}
									{{$anteojo->tratamiento_progresivo_premium}}</dd>
							</div>
							@if($anteojo->tratamiento_progresivo_basico=='SI'||$anteojo->tratamiento_progresivo_premium=='SI')
							<div class="col-sm-3">
								<label class="control-label">Antirreflejante</label>
								<dd>@if($anteojo->tratamiento_progresivo_basico_antirreflejante=='NO')

									@else
									{{$anteojo->tratamiento_progresivo_basico_antirreflejante}}
									@endif
									{{$anteojo->anti_premium_progresivo}}
								</dd>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Fotocromático</label>
								<dd>@if($anteojo->tratamiento_progresivo_basico_fotocromatico=='NO')

									@else
									{{$anteojo->tratamiento_progresivo_basico_fotocromatico}}
									@endif
									{{$anteojo->foto_premium_progresivo}}
								</dd>
							</div>
							@endif
						</div>
						@break
						@default
						DEFAULT
						@endswitch
					</div>
				</div>
			</div>
			<div class="modal-header jumbotron">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Lentes de Contacto</strong></h5>
			</div>
			<div class="modal-body" >
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<dd>Aquí va Sección de Lentes de Contacto</dd>
							</div>
						</div>
					</div>
				</div>
			</div>
			@break
			@default
			@break
			@endswitch






			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>

			</div>
		</div>
	</div>
</div>