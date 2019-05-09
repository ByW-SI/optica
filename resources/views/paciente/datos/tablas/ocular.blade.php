<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
			<tr class="info">
				<th>General</th>
				<th>Antecedentes</th>
				<th>Revisión Visual</th>
				<th>Anexos</th>
				<th>Graduación</th>
				{{-- <th>Opciones</th> --}}
			</tr>
			@foreach($paciente->oculares as $ocular)
				<tr class="active">
					<td>
						<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ocular_modal{{ $ocular->id }}1">
						  Click para Ver
						</button>
					</td>
					<td>
						<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ocular_modal{{ $ocular->id }}2">
						  Click para Ver
						</button>
					</td>
					<td>
						<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ocular_modal{{ $ocular->id }}3">
						  Click para Ver
						</button>
					</td>
					<td>
						<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ocular_modal{{ $ocular->id }}4">
						  Click para Ver
						</button>
					</td>
					<td>
						<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ocular_modal{{ $ocular->id }}5">
						  Click para Ver
						</button>
					</td>
					{{-- <td>
						<button class="btn btn-warning" data-target="#ocular_modal{{ $ocular->id }}6">
							<i class="fa fa-print"></i> Imprimir
						</button>
					</td> --}}
				</tr>
			@endforeach
		</table>
	</div>
</div>