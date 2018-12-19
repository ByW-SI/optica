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
			<form method="POST" action="{{ route('inventarios.baja.update', ['inventario' => $inventario]) }}">
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
						<div class="form-group col-sm-4">
							<label class="control-label">✱Cantidad:</label>
							<input type="number" class="form-control" step="1" min="0" max="{{ $inventario->cantidad }}" name="cantidad" required="">
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">✱Causa:</label>
							<select name="causa" class="form-control" required="" id="causa">
								<option value="" selected="">Seleccionar</option>
								<option value="Merma">Merma</option>
								<option value="Robo">Robo</option>
								<option value="Baja de catálogo">Baja de catálogo</option>
								<option value="Donación">Donación</option>
								<option value="Garantía">Garantía</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">✱Descripción:</label>
							<input type="text" class="form-control" name="descripcion" required="">
						</div>
						<div id="robo" style="display: none;">
							<div class="form-group col-sm-4">
								<label class="control-label">✱¿Quién lo robó?</label>
								<input type="text" class="form-control" name="ladron" id="ladron">
							</div>
							<div class="form-group col-sm-4">
								<label class="control-label">✱¿Existe denuncia?</label>
								<select class="form-control" name="denuncia" id="denuncia">
									<option value="">Seleccionar</option>
									<option value="Sí">Sí</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div id="donacion" style="display: none;">
							<div class="form-group col-sm-4">
								<label class="control-label">✱¿A quién se dona?</label>
								<input type="text" class="form-control" name="receptor" id="receptor">
							</div>
							<div class="form-group col-sm-4">
								<label class="control-label">✱Autorizó:</label>
								<input type="text" class="form-control" name="autorizo" id="autorizo">
							</div>
						</div>
						<div class="form-group col-sm-4" id="garantia" style="display: none;">
							<label class="control-label">✱Código:</label>
							<input type="text" class="form-control" name="codigo" id="codigo">
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

<script type="text/javascript">
	
	function reset() {
		$('#robo').hide();
		$('#ladron').prop('required', false);
		$('#denuncia').prop('required', false);
		$('#ladron').val('');
		$('#denuncia').val('');
		
		$('#donacion').hide();
		$('#receptor').prop('required', false);
		$('#autorizo').prop('required', false);
		$('#receptor').val('');
		$('#autorizo').val('');
		
		$('#garantia').hide();
		$('#codigo').prop('required', false);
		$('#codigo').val('');
	}

	$(document).ready(function() {

		$('#causa').change(function() {
			reset();
			switch($(this).val()) {
				case 'Robo':
					$('#robo').show();
					$('#ladron').prop('required', true);
					$('#denuncia').prop('required', true);
					break;
				case 'Donación':
					$('#donacion').show();
					$('#receptor').prop('required', true);
					$('#autorizo').prop('required', true);
					break;
				case 'Garantía':
					$('#garantia').show();
					$('#codigo').prop('required', true);
					break;
			}
		});

	});

</script>


@endsection