<div class="row">
	<div class="col-sm-6" >
		<label class="control-label">
			<strong>Todas las Citas</strong>
		</label>
		<div style="height: 300px; overflow: scroll;">
			<table class="table table-striped table-bordered table-hover" style="border-collapse: collapse; margin-bottom: 0px; overflow: scroll;">
				<tr class="info">
					<th>Fecha de la cita</th>
					<th>Hora</th>
					<th>Paciente</th>
					<th>Sucursal</th>
				</tr>
				@foreach($citas as $cita)
					<tr>
						<td>{{ $cita->proxima_cita }}</td>
						<td>{{ $cita->hora }}:{{ $cita->minutos }}</td>
						<td>{{ $cita->paciente->nombre }} {{ $cita->paciente->appaterno }}</td>
						<td>{{ $cita->sucursal_clave }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-sm-6">
		<label class="control-label">
			<strong>Citas de {{ $paciente->nombre }} {{ $paciente->appaterno }}</strong>
		</label>
		<div style="height: 300px; overflow: scroll;">
			<table class="table table-striped table-bordered table-hover" style="border-collapse: collapse; margin-bottom: 0px; overflow: scroll;" id="c_paciente">
				<tr class="info">
					<th>Fecha de la cita</th>
					<th>Hora</th>
					<th>Sucursal</th>
				</tr>
				@foreach($paciente->citas as $cita)
					<tr>
						<td>{{ $cita->proxima_cita }}</td>
						<td>{{ $cita->hora }}</td>
						<td>{{ $cita->sucursal_clave }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
