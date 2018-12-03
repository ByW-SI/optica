@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Inventario:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('inventarios.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Inventario</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('inventarios.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Inventario</strong>
						</a>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ route('inventarios.alta.update', ['inventario' => $inventario]) }}">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4">
							<label class="control-label">SKU Interno:</label>
							<dd>{{ $inventario->producto->sku_interno }}</dd>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">Descripción:</label>
							<dd>{{ $inventario->producto->descripcion }}</dd>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">Proveedor:</label>
							<dd>{{ $inventario->producto->provedor->nombre . ' ' . $inventario->producto->provedor->apellidopaterno }}{{ $inventario->producto->provedor->razonsocial }}</dd>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4 col-sm-offset-4">
							<label class="control-label">✱Cantidad a Agregar:</label>
							<input type="number" class="form-control" step="1" min="0" name="cantidad" required="">
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check-circle"></i> Guardar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection