@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Convenios:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('convenios.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Convenio</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($convenios) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0;">
								<tr class="info">
									<th>Nombre/Razón Social</th>
									<th>Tipo de persona</th>
									<th>Alias</th>
									<th>RFC</th>
									<th>Acción</th>
								</tr>
								@foreach($convenios as $convenio)
									<tr>
										<td>
											@if($convenio->tipopersona == "Fisica")
												{{ $convenio->nombre }} {{ $convenio->apellidopaterno }} {{ $convenio->apellidomaterno }}
											@else
												{{ $convenio->razonsocial }}
											@endif
										</td>
										<td>{{ $convenio->tipopersona }}</td>
										<td>{{ $convenio->alias }}</td>
										<td>{{ strtoupper($convenio->rfc) }}</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm" href="{{ route('convenios.show',['provedor' => $convenio]) }}">
												<i class="fa fa-eye"></i><strong> Ver</strong>
											</a>
											<a class="btn btn-warning btn-sm" href="{{ route('convenios.edit',['provedor' => $convenio]) }}">
												<i class="fa fa-pencil"></i><strong> Editar</strong>
											</a>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>No hay Convenios disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection