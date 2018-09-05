<div class="modal-header">
	<h4 class="modal-title" id="exampleModalLongTitle">
		<strong>Lentes de Armazón</strong>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
		</button>
	</h4>
</div>
<div class="modal-body" >
	<div class="panel-default">
		<div class="panel-body">
			@switch($anteojo->tipo_lente)

			@case('MONOFOCAL')
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				</div>

				<div class="col-sm-4">
					<label class="control-label">Tipo de Monofocal</label>
					<dd>{{$anteojo->monofocal}}</dd>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Material</label>
					<dd>{{$anteojo->monofocal_material}}</dd>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label">Modelo</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
					<dd>{{$anteojo->monofocal_material_premium}}</dd>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Tratamiento</label>
					<dd>{{$anteojo->tratamiento}}</dd>
				</div>
				@if($anteojo->tratamiento == 'SI')

				@switch($anteojo->monofocal_material)
				
				@case('BÁSICO')
				@if($anteojo->polarizado_basico != null)
				<div class="col-sm-4">
					<label class="control-label">Polarizado</label>
					<dd>{{$anteojo->polarizado_basico}}</dd>
				</div>
				@elseif($anteojo->anti_basico != null && $anteojo->foto_basico == null)
				<div class="col-sm-4">
					<label class="control-label">Antirreflejante</label>	
					<dd>{{$anteojo->anti_basico}}</dd>
				</div>
				@elseif($anteojo->anti_basico == null && $anteojo->foto_basico != null)
				<div class="col-sm-4">
					<label class="control-label">Fotocromático</label>
					<dd>{{$anteojo->foto_basico}}</dd>
				</div>
				@endif
				@break
				@case('PREMIUM')
				@if($anteojo->polarizado_premium != null)
				<div class="col-sm-4">
					<label class="control-label">Polarizado</label>
					{{$anteojo->polarizado_premium}}</dd>
				</div>
				@elseif($anteojo->anti_premium != null && $anteojo->foto_premium == null)
				<div class="col-sm-4">
					<label class="control-label">Antirreflejante</label>	
					<dd>{{$anteojo->anti_premium}}</dd>
				</div>
				@elseif($anteojo->anti_premium == null && $anteojo->foto_premium != null)
				<div class="col-sm-4">
					<label class="control-label">Fotocromático</label>
					<dd>{{$anteojo->foto_premium}}</dd>
				</div>
				@endif
				@break

				@endswitch

				@endif
			</div>
			@if($anteojo->tratamiento == 'SI')
			
			@switch($anteojo->monofocal_material)
			
			@case('BÁSICO')
			@if($anteojo->anti_basico != null && $anteojo->foto_basico != null)
			<br>
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label">Fotocromático</label>
					<dd>{{$anteojo->foto_basico}}</dd>
				</div>
			</div>
			@endif
			@break
			@case('PREMIUM')
			@if($anteojo->anti_premium != null && $anteojo->foto_premium != null)
			<br>
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label">Fotocromático</label>
					<dd>{{$anteojo->foto_basico}}{{$anteojo->foto_premium}}</dd>
				</div>
			</div>
			@endif
			@break

			@endswitch
			@endif
			@break

			@case('BIFOCAL')
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				</div>

				<div class="col-sm-4">
					<label class="control-label">Tipo de Bifocal</label>
					<dd>{{$anteojo->bifocal}}</dd>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Material</label>
					<dd>{{$anteojo->bifocal_flat_material}} 
						@if($anteojo->bifocal_blend_material=='NO')

						@else
						CR-39 W
						@endif

					</dd>
				</div>
			</div><br>
			<div class="row">
				@if($anteojo->tratamiento_flat=='SI')
				<div class="col-sm-4">
					<label class="control-label">Tratamientos:</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Antirreflejante Básico</label>
					<dd>{{$anteojo->tratamiento_flat_antirreflejante_basico}}</dd>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Fotocromático Básico</label>
					<dd>{{$anteojo->tratamiento_flat_fotocromatico_basico}}</dd>
				</div>
				@elseif($anteojo->tratamiento_blend=='SI')
				<div class="col-sm-4">
					<label class="control-label">Tratamientos:</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Antirreflejante Básico</label>
					<dd>{{$anteojo->tratamiento_blend_basico}}</dd>
				</div>

				@endif
			</div><br>
			@break

			@case('PROGRESIVO')
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				</div>

				<div class="col-sm-4">
					<label class="control-label">Tipo de Progresivo</label>
					<dd>{{$anteojo->progresivo}}</dd>
				</div>
				@isset($anteojo->progresivo_premium_kodak)
				<div class="col-sm-4">
					<label class="control-label">KODAK</label>
					<dd>{{$anteojo->progresivo_premium_kodak}}</dd>
				</div>
				@endisset
				<div class="col-sm-4">
					<label class="control-label">Material</label>
					<dd>{{$anteojo->progresivo_basico_material}} 
						{{$anteojo->progresivo_premium_material}} 
					</dd>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label">Tratamiento:</label>
					<dd>{{$anteojo->tratamiento_progresivo_basico}}
						{{$anteojo->tratamiento_progresivo_premium}}</dd>
				</div>
				@if($anteojo->tratamiento_progresivo_basico=='SI'||$anteojo->tratamiento_progresivo_premium=='SI')
				<div class="col-sm-4">
					<label class="control-label">Antirreflejante</label>
					<dd>@if($anteojo->tratamiento_progresivo_basico_antirreflejante=='NO')

						@else
						{{$anteojo->tratamiento_progresivo_basico_antirreflejante}}
						@endif
						{{$anteojo->anti_premium_progresivo}}
					</dd>
				</div>
				<div class="col-sm-4">
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
			NO EXISTE LA INFORMACIÓN.

			@endswitch
		</div>
	</div>
</div>