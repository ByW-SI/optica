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
					<th>Nombre</th>
				</tr>
				<tr>
					<td>fecha1</td>
					<td>cita1</td>
					<td id="citaradio">nombre1</td>
				</tr>
				<tr>
					<td>fecha1</td>
					<td>cita1</td>
					<td id="citaradio">nombre1</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row panel-body">
		<div class="col-sm-4">
			<div class="form-group">
				<label for="vienecita" class="col-sm-4 control-label">Viene a cita:</label>
				<div class="col-sm-10">
					<div class="radio">
						<div class="col-sm-3">
							<label>
								<input class="radiocita" type="radio" name="citaradio" id="optionsRadios1" onchange="cocultar(this)" value="si">
								Sí
							</label>
						</div>
						<div class="col-sm-3">
							<label>
								<input class="radiocita" type="radio" name="citaradio" id="optionsRadios2" onchange="cocultar(this)" value="no">
								No
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		{{-- Cita --}}		
	<div id="si-cita">
		<div class="col-sm-3">
			<div class="container" style="display: inline; float: none; margin-top: 10px; margin-bottom: 0px;">
				<img id="imagen" src="https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg" alt="Previa..." style="width: 250px; height: auto;">
		      	<div class="caption text-center">
					<label for="pie" class="col-sm control-label" style="margin-top: 10px;">Subir foto del pie</label>
		        	<p><input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;">
					<input type="button" value="Examinar" class="btn btn-primary" onclick="document.getElementById('pie').click();" />
					<input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;"></p>
		      	</div>
		    </div>
		</div>
		<div class="col-sm-8">
			<div class="form-group">
				<div class="row col">
					<label for="diag" class="col-sm control-label" style="margin-top: 10px;">Diagnóstico:</label>
					<textarea class="form-control" maxlength="1000" rows="4"></textarea>
				</div>
				<div class="row col">
					<label for="reco" class="col-sm control-label" style="margin-top: 10px;">Recomendación:</label>
					<textarea class="form-control" maxlength="1000" rows="4"></textarea>
				</div>
				<div class="row col">
					<label for="trat" class="col-sm control-label" style="margin-top: 10px;">Tipo de tratamiento:</label>
					<textarea class="form-control" maxlength="1000" rows="4"></textarea>
				</div>
			</div>
		</div>
	</div>


	<div id="no-cita">
		<div class="col-sm-3">
			<div class="container" style="display: inline; float: none; margin-top: 10px; margin-bottom: 0px;">
				<img id="imagen" src="https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg" alt="Previa..." style="width: 250px; height: auto;">
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
					<input type="text" class="form-control" id="donde">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="col">
			<label>Tipo de Tratamiento:</label>

			<div class="col form-group">
				<label><input type="radio" name="tratamiento" value="zapatos"> Zapatos</label>
				<br>
				<label><input type="radio" name="tratamiento" value="tenis"> Tenis</label>
				<br>
				<label><input type="radio" name="tratamiento" value="ambos"> Ambos</label>
			</div>
			<div class="col">
				
				<div class="form-group">
					<div class="input-group-prepend">
    					<label class="input-group-text">Número :</label>
  					</div>
					<div class="col-sm-3">
						<input type="number" class="form-control" step="0.5" value="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="col">
			<label>Plantilla:</label>

			<div class="col form-group">
				<label><input type="radio" name="plantilla" value="piel"> Piel</label>
				<br>
				<label><input type="radio" name="plantilla" value="pelite"> Pelite</label>
				<br>
				<label><input type="radio" name="plantilla" value="otro"> Ambos</label>
			</div>
			<div class="col">
				
				<div class="form-group">
					<div class="input-group-prepend">
    					<label class="input-group-text">Número :</label>
  					</div>
					<div class="col-sm-3">
						<input type="number" class="form-control" step="0.5" value="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>