<div class="panel-default">
	<div class="panel-heading">
		<h4>Anteojos:</h4>
	</div>
	@if($paciente->anteojo->count() == 0)
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-9">
				<h2><strong>Aun no se ha agregado Historial de Anteojos:</strong></h2>
			</div>
			<div class="col-sm-3">
				<br>
				<a class="btn btn-primary" href="{{ route('pacientes.anteojos.create',['paciente'=>$paciente]) }}">
					<strong>Agregar</strong>
				</a>
			</div>
		</div>
		<br>
	</div>
	@else
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12 offset-md-12 text-center">
				<a class="btn btn-primary" href="{{ route('pacientes.anteojos.create',['paciente'=>$paciente]) }}"><strong>Agregar</strong></a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="info">
							<th>Fecha de Registro</th>
							<th>Tipo de Anteojos</th>
							<th>Tipo de Lente</th>
							<th>Caracteristicas</th>
							<th>Operaciones de Registro</th>
						</tr>
					</thead>
					<tbody>
						@foreach($paciente->anteojo as $anteojo)
						<tr class="oc" data-toggle="modal" data-target="#anteojo_modal{{$anteojo->id}}">
							<td>{{$anteojo->created_at}}</td>
							<td>{{$anteojo->tipo_anteojo}}</td>
							@if($anteojo->tipo_anteojo == 'AMBOS')
							<td>{{$anteojo->tipo_lente}} & {{$anteojo->tipo_lentilla}}</td>
							@else
							<td>{{$anteojo->tipo_lente}}{{$anteojo->tipo_lentilla}}</td>
							@endif
							@switch($anteojo->tipo_lente)
							@case('MONOFOCAL')
							<td>{{$anteojo->monofocal}}</td>
							@break

							@case('BIFOCAL')
							<td>{{$anteojo->bifocal}}</td>
							@break

							@case('PROGRESIVO')
							<td>{{$anteojo->progresivo}}</td>
							@break
							@default
							<td>{{$anteojo->categoria}}</td>
							@endswitch
							<td>{{$anteojo->opciones}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endif
</div>