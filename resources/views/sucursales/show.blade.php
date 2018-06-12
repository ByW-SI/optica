	@extends('layouts.test')
@section('content1')

<div class="row">
	<div class="col-sm-3 col-sm-offset-6">
		<button class="btn btn-warning" onclick="location.reload();"><strong>Actualizar</strong> </button>
	</div>
</div>
	
				<div role="application" class="panel panel-group">
				<div class="panel-default">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>

					<tr class="info">
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Area</th>
						<th>Puesto</th>
						
						
					</tr>

				</thead>
				<tbody>


					@foreach($empleados as $empleado)
					 
					
                   <tr>
						<td>{{$empleado->identificador}}</td>
						<td>{{$empleado->nombre}}</td>
						<td>{{$empleado->appaterno}}</td>
						<td>{{$empleado->apmaterno}}</td>

                       	<?php $act;?>
							@foreach($empleado->datosLab as $datos)
							<?php $act=$datos;?>
							@endforeach

                         @foreach($areas as $area)
                         @if($act->area_id==$area->id)
						<td>{{$area->nombre}}</td>
							
						@endif
							@endforeach
							@if($act->area_id==null)
							<td>No Definido</td>
							@endif


							

						@foreach($puestos as $puesto)
						@if($act->puesto_id==$puesto->id)
						
						<td>{{$puesto->nombre}}</td>
						
						
						@endif
						@endforeach
						@if($act->puesto_id==null)
							<td>No Definido</td>
							@endif

					</tr>	
					
					@endforeach



				</tbody>

			</table>
		</div></div>
	
@endsection
