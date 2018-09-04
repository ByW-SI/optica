<div class="panel-default"  >
	<div class="panel-heading" >
		<div class="row">
			<div class="col-sm-1">
				<h5>Citas</h5>
			</div>
			<div class="col-sm-3">
				<i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos
			</div>
		</div>
	</div>
	<div class="panel-body" >
		{{ csrf_field() }} 
		<input type="hidden" name="paciente_id" value="{{$paciente->id}}" id="paciente_id">
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="proxima_cita">
					<i class="fa fa-asterisk" aria-hidden="true"></i>Fecha Próxima Cita:
				</label>
				<input type="date" class="form-control" id="proxima_cita" name="proxima_cita" required min="{{date('Y-m-d')}}" max="2030-12-31">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="hora">
					<i class="fa fa-asterisk" aria-hidden="true"></i>Hora:
				</label>
				<select class="form-control" type="select" name="hora" id="hora" required>
					<option value="">Seleccione una Hora</option>
					<?php
						for($i = 0; $i < 24; $i++) {
							if($i <= 11)
								echo"<option id='' value='".$i.":00 am'>".$i.":00 am </option>";
							else
								echo"<option id='' value='".$i.":00 pm'>".$i.":00 pm </option>";
						}
					?>
				</select>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="minutos">
					<i class="fa fa-asterisk" aria-hidden="true"></i>Minutos:
				</label>
				<select class="form-control" type="select" name="minutos" id="minutos" required>
					<option value="">Seleccione el Minuto</option>
					<?php
						for($i = 0; $i < 60; $i+=15)
							echo"<option id='' value='".$i." mins'>".$i." mins </option>";
					?>
				</select>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="sucursal_clave">
					<i class="fa fa-asterisk" aria-hidden="true"></i>Sucursal:
				</label>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon3" onclick="getSucursal()">
						<i class="fa fa-refresh" aria-hidden="true"></i>
					</span>
					<select type="select" name="sucursal_clave" class="form-control" id="sucursal" required>
						<option id="sin_definir" value="sin_definir">Sin Definir</option>
						@foreach ($sucursales as $sucursal)
						<option  value="{{$sucursal->claveid}}">{{$sucursal->nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group ">
					<label class="control-label" for="comentarios">Comentarios/Observaciones:</label>
					<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
				</div> 
			</div>
			<div class="col-sm-3 col-sm-offset-2">
				<button  type="submit" class="btn btn-primary" onclick="cita()">
					<strong>Agregar</strong>
				</button>
			</div>
		</div>
	</div>
	<div class="panel-body" id="todas">
		@include('paciente.datos.tablas.citas')
	</div>
</div>