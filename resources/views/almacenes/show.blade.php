	@extends('layouts.test')
@section('content1')

	
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
					 @foreach($empleado as $emplead)
					
                   <tr>
						<th>{{$emplead->identificador}}</th>
						<th>{{$emplead->nombre}}</th>
						<th>{{$emplead->appaterno}}</th>
						<th>{{$emplead->apmaterno}}</th>


							<?php $act;?>
							@foreach($emplead->datosLab as $datos)
							<?php $act=$datos;?>
							@endforeach

                         @foreach($areas as $area)
                         @if($act->area_id==$area->id)
						<th>{{$area->nombre}}</th>
							@else
							<th>NO DEFINIDO</th>
						@endif
							@endforeach


							

						@foreach($puestos as $puesto)
						@if($act->puesto_id==$puesto->id)
						
						<th>{{$puesto->nombre}}</th>
						@else
							<th>NO DEFINIDO</th>
						
						@endif
						@endforeach



					</tr>	
					 @endforeach
					@endforeach



				</tbody>

			</table>
		</div></div>
	
@endsection
