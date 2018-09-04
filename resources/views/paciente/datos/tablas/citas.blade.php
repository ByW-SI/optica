<div class="row">
	<div class="col-sm-6" >
		<label class="control-label">
			<strong>Todas las Citas</strong>
		</label>
		<div style="height: 450px;overflow: scroll;">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px; overflow: scroll;">
				<thead>
					<tr class="info">
						<th>Fecha Próxima Cita</th>
						<th>Hora</th>
						<th>Paciente</th>
						<th>Sucursal</th>
					</tr>
				</thead>
				<tbody >
					@foreach($citas as $cita)
					<tr>
						<td>{{$cita->proxima_cita}}</td>
						<td>{{$cita->hora}}:{{$cita->minutos}}</td>
						<td>{{$cita->paciente->nombre}}&nbsp;&nbsp;{{$cita->paciente->appaterno}}&nbsp;&nbsp;{{$cita->paciente->apmaterno}}</td>
						<td>{{$cita->sucursal_clave}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-sm-6">
		<label class="control-label">
			<strong>Citas del Paciente: {{$paciente->nombre}}&nbsp;&nbsp;{{$paciente->appaterno}}</strong>
		</label>
		<div style="height: 450px;overflow: scroll;">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px; overflow: scroll;" id="c_paciente">
				<thead>
					<tr class="info">
						<th>Fecha Próxima Cita</th>
						<th>Hora</th>
						<th>Sucursal</th>
					</tr>
				</thead>
				<tbody >
					@foreach($paciente->citas as $cita)
					<tr>
						<td>{{$cita->proxima_cita}}</td>
						<td>{{$cita->hora}}</td>
						<td>{{$cita->sucursal_clave}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
