@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Generar orden de trabajo:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(isset($productos))
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0;">
								<tr class="info">
									<th>seleccionar</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Descuento</th>
								</tr>
									<tr>
										<td>
											<input type="checkbox" name="sel" class="control-label">
										</td>
										<td>{{ $productos->id }}</td>
										<td>
											@if(isset($productos->sku_interno) )
												{{ $productos->sku_interno }}
											@else
												Sin descuento
											@endif
										</td>
										<td>{{ $productos->descripcion }}</td>
									</tr>
							</table>
						@else
							<h4>No se agregaron productos</h4>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="#">
							<strong> Imprimir Ticket</strong></a>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="#">
							<strong>Generar Orden de trabajo</strong></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection