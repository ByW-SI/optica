<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<h4>Historial Ortopédico:</h4>
			</div>
			<div class="col-sm-4 text-center">
				@if(count($paciente->ortopedias) != 0)
				@if($paciente->ortopedias->last()->fecha == date('Y-m-d'))
				<a class="btn btn-warning" href="{{ route('pacientes.ortopedias.edit', ['paciente'=>$paciente, 'id' => $paciente->ortopedias->last()->id]) }}">
					<strong>Editar</strong>
				</a>
				@endif
				@else
				<a class="btn btn-success" href="{{ route('pacientes.ortopedias.create', ['paciente'=>$paciente]) }}">
					<strong>Agregar</strong>
				</a>
				@endif
			</div>
		</div>
	</div>
	<div class="panel-body">
		@if($paciente->ortopedias->count() == 0)
		<div class="row">
			<div class="col-sm-9">
				<h2><strong>Aún no se ha agregado Historial Ortopédico:</strong></h2>
			</div>
		</div>
		<br>
		@else
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered table-hover">
					<tr class="info">
						<th>Fecha</th>
						<th>Cita</th>
						<th>Diagnostico/Clinica</th>
						<th class="text-center">Acciones</th>
					</tr>
					@foreach($paciente->ortopedias as $cita)
					<tr>
						<td>{{ $cita->fecha }}</td>
						<td>{{ $cita->cita ? 'Si' : 'No' }}</td>
						<td>{{ $cita->cita ? $cita->diagnostico : $cita->clinica }}</td>
						<td class="text-center">
							<a href="{{ route('pacientes.ortopedias.show', ['paciente' => $paciente->id, 'cita' => $cita->id]) }}">
								<button class="btn btn-info"><strong>Ver</strong></button>
							</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		@endif
	</div>
</div>