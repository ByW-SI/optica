<table class="table table-striped table-bordered table-hover" style="color:rgb(51, 51, 51); border-collapse: collapse; margin-bottom: 0px">
	<thead>
		<tr class="info">
			<th>Nombre</th>
			<th>Relación</th>
			<th>Telefono Casa</th>
			<th>Celular</th>
			<th>Ver/Modificar</th>
		</tr>
	</thead>
	<tbody>
		@foreach($paciente->tutores as $tutor)
		<tr class="active">
			<td>{{$tutor->nombre . ' ' . $tutor->appaterno . ' ' . $tutor->apmaterno}}</td>
			<td>{{$tutor->relacion}}</td>
			<td>{{$tutor->tel_casa}}</td>
			<td>{{$tutor->tel_cel}}</td>
			<td class="text-center">
				<button class="btn btn-warning" data-toggle="modal" data-target="#tutor_{{$tutor->id}}">
					<strong>Editar</strong>
				</button>
				<button class="btn btn-danger">
					<strong>Eliminar</strong>
				</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>