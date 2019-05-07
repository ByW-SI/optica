@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Tutores:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('tutores.create')}}">
							<i class="fa fa-plus"></i><strong> Agregar Tutor</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($tutores) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>Acciones</th>
								</tr>
								@foreach ($tutores as $tutor)
									<tr>
										<td>{{ $tutor->nombre }}</td>
										<td>{{ $tutor->appaterno }}</td>
										<td>{{ $tutor->apmaterno ? $tutor->apmaterno : 'N/A' }}</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm" href="{{ route('tutores.show', ['tutor' => $tutor]) }}">
												<i class="fa fa-eye"></i> <strong>Ver</strong>
											</a>
											<a class="btn btn-warning btn-sm" href="{{ route('tutores.edit', ['tutor' => $tutor]) }}">
												<i class="fa fa-pencil-square-o"></i> <strong>Editar</strong>
											</a>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>Aún no hay tutores agregados.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection