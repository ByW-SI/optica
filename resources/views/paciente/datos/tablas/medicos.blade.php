<div class="col-sm-12 offset-md-12" align="center">
	<br>
	<a class="btn btn-primary" href="{{ route('pacientes.historialmedico.create',['paciente'=>$paciente]) }}">
		<strong>Agregar</strong>
	</a>
</div>
<br><br><br><br>
<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
	<thead>
		<tr class="info">
			<th>Fecha de la Cita</th>
			<th>Alergias</th>
			<th>Enfermedades Crónicas</th>
			<th>Tratamiento</th>
			@if($paciente->sexo == 'Femenino')
			<th>Embarazo</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($paciente->medico as $medico)
		<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" data-toggle="modal" data-target="#medico_modal{{$medico->id}}">
			<td>{{$medico->created_at}}</td>
			<td>{{$medico->alergia}}</td>
			<td>{{$medico->enfermedad}}</td>
			<td>{{$medico->tratamiento}}</td>
			@if($paciente->sexo == 'Femenino')
			<td>{{$medico->embarazo}}</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>