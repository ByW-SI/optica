<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
	<tr class="info">
		<th>Fecha de Registro</th>
		<th>Tipo de Anteojos</th>
		<th>Tipo de Lente</th>
		<th>Caracteristicas</th>
		<th>Operaciones de Registro</th>
	</tr>
	@foreach($paciente->anteojo as $anteojo)
		<tr class="oc" data-toggle="modal" data-target="#anteojo_modal{{ $anteojo->id }}">
			<td>{{ $anteojo->created_at }}</td>
			<td>{{ $anteojo->tipo_anteojo }}</td>
			@if($anteojo->tipo_anteojo == 'AMBOS')
				<td>{{ $anteojo->tipo_lente }} & {{ $anteojo->tipo_lentilla }}</td>
			@else
				<td>{{ $anteojo->tipo_lente }}{{ $anteojo->tipo_lentilla }}</td>
			@endif
			@switch($anteojo->tipo_lente)
				@case('MONOFOCAL')
					<td>{{ $anteojo->monofocal }}</td>
					@break
				@case('BIFOCAL')
					<td>{{ $anteojo->bifocal }}</td>
					@break
				@case('PROGRESIVO')
					<td>{{ $anteojo->progresivo }}</td>
					@break
				@default
					<td>{{ $anteojo->categoria }}</td>
					@break
			@endswitch
			<td>{{ $anteojo->opciones }}</td>
		</tr>
	@endforeach
</table>