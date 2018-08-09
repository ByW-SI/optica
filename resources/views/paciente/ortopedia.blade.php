<div class="row panel-body">
	<div class="col-sm-4">
		<div class="col">
			<div class="form-group">
				<label for="fecha" class="col-sm-4 control-label">Fecha Actual</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" readonly="" id="fecha" value="{{ date('Y-m-d') }}">
				</div>
			</div>
		</div>
		
	</div>
	{{-- Tabla --}}
	<div class="col-sm-8">
		<div class="form-group">
			<table class="table table-striped table-bordered table-hover" style="margin-top: 20px;">
				<tr class="info">
					<th>Fecha</th>
					<th>Cita</th>
					<th>Diagnostico/Clinica</th>
				</tr>
				<tbody>
					@foreach ($paciente->ortopedias as $cita)
						{{-- expr --}}
						<tr>
							<th>{{$cita->fecha}}</th>
							<th>{{$cita->cita ? 'Si' : 'No'}}</th>
							<th>{{$cita->cita ? $cita->diagnostico : $cita->clinica}}</th>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<form role="form" name="ortopedia" id="form-ortopedia" method="POST" action="{{ route('pacientes.ortopedias.store',['paciente'=>$paciente]) }}" enctype="multipart/form-data">
		{{ csrf_field()}}
		<div class="row panel-body"> 
			<div class="col-sm-4">
				<div class="form-group">
					<label for="vienecita" class="col-sm-4 control-label">Viene a cita:</label>
					<div class="col-sm-10">
						<div class="radio">
							<div class="col-sm-3">
								<label>
									<input class="radiocita" type="radio" name="citaradio" id="optionsRadios1" onchange="cocultar(this)" value="si" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == true)
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif>
									Sí
								</label>
							</div>
							<div class="col-sm-3">
								<label>
									<input class="radiocita" type="radio" name="citaradio" id="optionsRadios2" onchange="cocultar(this)" value="no" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == false)
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif>
									No
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
			{{-- Cita --}}		
		<div id="si-cita" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == true)
										{{-- true expr --}}
										style="display: inline !important;" 
										{{-- false expr --}}
									@else
									style="display: none;" 
									@endif>
			<div class="col-sm-3">
				<div class="container" style="display: inline; float: none; margin-top: 10px; margin-bottom: 0px;">
					<img id="imagen"  @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d'))
							{{-- true expr --}}
							src="{{ url('/storage/'.$paciente->ortopedias->last()->path_image) }}" 
							{{-- false expr --}}
						@else
						src="https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg"
						@endif alt="Previa..." style="width: 250px; height: auto;">
			      	<div class="caption text-center">
						<label for="pie" class="col-sm control-label" style="margin-top: 10px;">Subir foto del pie</label>
			        	<p><input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;" name="image">
						<input type="button" value="Examinar" class="btn btn-primary" onclick="document.getElementById('pie').click();" />
						<input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;"></p>
			      	</div>
			    </div>
			</div>
			<div class="col-sm-8">
				<div class="form-group">
					<div class="row col">
						<label for="diag" class="col-sm control-label" style="margin-top: 10px;">Diagnóstico:</label>
						<textarea class="form-control" name="diagnostico" maxlength="1000" rows="4">@if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == true){{$paciente->ortopedias->last()->diagnostico}}@endif</textarea>
					</div>
					<div class="row col">
						<label for="reco" class="col-sm control-label" style="margin-top: 10px;">Recomendación:</label>
						<textarea class="form-control" maxlength="1000" name="recomendacion" rows="4">@if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == true){{$paciente->ortopedias->last()->recomendacion}}@endif</textarea>
					</div>
					<div class="row col">
						<label for="trat" class="col-sm control-label" style="margin-top: 10px;">Tipo de tratamiento:</label>
						<textarea class="form-control" maxlength="1000" name="tipo_tratamiento" rows="4">@if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == true){{$paciente->ortopedias->last()->tratamiento}}@endif</textarea>
					</div>
				</div>
			</div>
		</div>


		<div id="no-cita" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == false)
										{{-- true expr --}}
										style="display: inline !important;" 
										{{-- false expr --}}
									@else
									style="display: none;" 
									@endif>
			<div class="col-sm-3">
				<div class="container" style="display: inline; float: none; margin-top: 10px; margin-bottom: 0px;">
					<img id="imagen" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d'))
							{{-- true expr --}}
							src="{{ url('/storage/'.$paciente->ortopedias->last()->path_image) }}" 
							{{-- false expr --}}
						@else
						src="https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg"
						@endif alt="Previa..." style="width: 250px; height: auto;">
			      	<div class="caption text-center">
						<label for="pie" class="col-sm control-label" style="margin-top: 10px;">Subir foto de la receta</label>
			        	<p><input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;">
						<input type="button" value="Examinar" class="btn btn-primary" onclick="document.getElementById('pie').click();" />
						<input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;"></p>
			      	</div>
			    </div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="donde" class="col-sm-4 control-label" style="margin-top: 10px;">¿De dónde viene?</label>
					<div class="col-sm-10">
						<input type="text" name="clinica" class="form-control" id="donde"  @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->cita == false && $paciente->ortopedias->last()->clinica != null)
										{{-- true expr --}}
										value="{{$paciente->ortopedias->last()->clinica}}" 
										{{-- false expr --}} 
									@endif>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="col">
				<label>Tipo de Tratamiento:</label>

				<div class="col form-group">
					<label><input type="radio" name="tratamiento" value="zapatos" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->tipo == "zapatos")
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif> Zapatos</label>
					<br>
					<label><input type="radio" name="tratamiento" value="tenis" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->tipo == "tenis")
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif> Tenis</label>
					<br>
					<label><input type="radio" name="tratamiento" value="ambos" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->tipo == "ambos")
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif> Ambos</label>
				</div>
				<div class="col">
					
					<div class="form-group">
						<div class="input-group-prepend">
	    					<label class="input-group-text">Número:</label>
	  					</div>
						<div class="col-sm-3">
							<input type="number" class="form-control" step="0.5" name="medida" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d'))
										value="{{$paciente->ortopedias->last()->medida}}"@endif>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="col">
				<label>Plantilla:</label>

				<div class="col form-group">
					<label><input type="radio" name="plantilla" value="piel" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->plantilla == "piel")
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif> Piel</label>
					<br>
					<label><input type="radio" name="plantilla" value="pelite" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->plantilla == "pelite")
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif> Pelite</label>
					<br>
					<label><input type="radio" name="plantilla" value="otro" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d') && $paciente->ortopedias->last()->plantilla == "otro")
										{{-- true expr --}}
										checked
										{{-- false expr --}}

									@endif> Otro</label>
				</div>
				<div class="col">
					
					<div class="form-group">
						<div class="input-group-prepend">
	    					<label class="input-group-text">Número:</label>
	  					</div>
						<div class="col-sm-3">
							<input type="number" class="form-control" step="0.5" name="medida_plant" @if ($paciente->ortopedias->last() != null && $paciente->ortopedias->last()->fecha ==  date('Y-m-d'))
										{{-- true expr --}}
										value="{{$paciente->ortopedias->last()->medida_plant}}" 
										{{-- false expr --}}

									@endif>
						</div>
					</div>

				</div>
			
			</div>
		</div>
	</form>
</div>