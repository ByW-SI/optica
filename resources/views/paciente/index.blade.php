@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Pacientes:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('pacientes.create')}}">
							<i class="fa fa-plus"></i><strong> Agregar Paciente</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 form-group">
						<div class="input-group">
							<input type="text" id="buscador" class="form-control" autofocus placeholder="Identificador/Nombre/Apellidos...">
					        <span class="input-group-btn">
								<a class="btn btn-default" onclick="buscar()"><i class="fa fa-search"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12" id="datos">
						@if(count($pacientes) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>@sortablelink('identificador', 'Identificador')</th>
									<th>@sortablelink('nombre', 'Nombre')</th>
									<th>@sortablelink('appaterno', 'Apellido Paterno')</th>
									<th>@sortablelink('apmaterno', 'Apellido Materno')</th>
									
									<th>Acciones</th>
								</tr>
								@foreach ($pacientes as $paciente)
									<tr>
										<td>{{ $paciente->identificador }}</td>
										<td>{{ $paciente->nombre }}</td>
										<td>{{ $paciente->appaterno }}</td>
										<td>{{ $paciente->apmaterno }}</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm" href="{{ route('pacientes.show', ['paciente'=>$paciente]) }}">
												<i class="fa fa-eye"></i><strong> Ver</strong>
											</a>
											<a class="btn btn-warning btn-sm" href="{{ route('pacientes.edit', ['paciente'=>$paciente]) }}">
												<i class="fa fa-pencil"></i><strong> Editar</strong>
											</a>
										</td>
									</tr>
								@endforeach
							</table>
							{{ $pacientes->links() }}
						@else
							<h4>Aún no hay pacientes disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function buscar() {
		var query = $('#buscador').val();
		$.ajax({
			url : "buscarpaciente",
			type : "GET",
			dataType : "html",
			data : {
				busqueda : query
			},
		}).done(function(resultado){
			$("#datos").html(resultado);
		});
	}

</script>

@endsection