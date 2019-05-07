@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Precio:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('precios.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Precios</strong>
						</a>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ route('precios.update', ['precio' => $precio]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4 col-sm-offset-2">
							<label class="control-label">Producto:</label>
							<dd>{{ $precio->producto->sku_interno }}</dd>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">✱Precio:</label>
							<input type="number" name="precio" step="0.01" min="0" class="form-control" value="{{ $precio->precio }}">
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