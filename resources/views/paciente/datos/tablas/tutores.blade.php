<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
	<tr class="info">
		<th>Nombre</th>
		<th>Relación</th>
		<th>Telefono Casa</th>
		<th>Teléfono Celular</th>
		<th>Acción</th>
	</tr>
	@foreach($paciente->relaciones as $relacion)
		<tr class="active">
			<td>{{ $relacion->tutor->nombre . ' ' . $relacion->tutor->appaterno . ' ' . $relacion->tutor->apmaterno }}</td>
			<td>{{ $relacion->relacion }}</td>
			<td>{{ $relacion->tutor->tel_casa ? $tutor->tel_casa : 'N/A' }}</td>
			<td>{{ $relacion->tutor->tel_cel ? $tutor->tel_cel : 'N/A' }}</td>
			<td class="text-center">
				<a class="btn btn-sm btn-primary" href="{{ route('tutores.show', ['tutor' => $relacion->tutor]) }}">
					<i class="fa fa-eye"></i> Ver
				</a>
				<a class="btn btn-sm btn-warning" href="{{ route('pacientes.tutores.edit', ['paciente' => $paciente, 'tutor' => $relacion->tutor]) }}">
					<i class="fa fa-pencil"></i> Editar
				</a>
			</td>
		</tr>
	@endforeach
</table>