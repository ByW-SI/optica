<div class="col-sm-12 offset-md-12" align="center">
	<br>
	<a class="btn btn-primary" href="{{ route('pacientes.historialocular.create',['paciente'=>$paciente]) }}">
		<strong>Agregar</strong>
	</a>
</div>
<br><br><br><br>
<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;font-size: 11px;">
	<thead>
		<tr class="info">
			<th>Información General</th>
			<th>Problemas Visuales y <br>Antecedentes Oculares<br> Familiares</th>
			<th>Revisión Visual</th>
			<th>Anexos/Biomicroscopía y <br>Archivo de Imagen</th>
			<th>Graduación</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($paciente->ocular as $ocular)
		<tr class="active">
			<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}1">
				<strong>{{$ocular->created_at}}</strong>
				<br>&nbsp;&nbsp;Click para Ver
			</td>
			<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}2">
				&nbsp;&nbsp;Click para Ver
			</td>
			<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}3">
				&nbsp;&nbsp;Click para Ver
			</td>
			<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}4">
				&nbsp;&nbsp;Click para Ver
			</td>
			<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}5">
				&nbsp;&nbsp;Click para Ver
			</td>
			<td>
				<button class="btn btn-warning" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}6">Imprimir</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>