@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos de la Sucursal:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-warning" href="{{ route('sucursales.edit', ['sucursal' => $sucursal]) }}">
							<i class="fa fa-pencil"></i><strong> Editar Sucursal</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-success" href="{{ route('sucursales.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Sucursal</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-primary" href="{{ route('sucursales.index') }}">
							<i class="fa fa-bars"></i><strong> Lista de Sucursales</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">Nombre:</label>
						<dd>{{ $sucursal->nombre }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="responsable">Responsable:</label>
						<dd>{{ $sucursal->responsable }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="claveid">ID:</label>
						<dd>{{ $sucursal->claveid }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="region">Región:</label>
    					<dd>{{ $sucursal->region }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Dirección de la Sucursal:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
    					<label class="control-label" for="calle">Calle:</label>
    					<dd>{{ $sucursal->calle }}</dd>
  					</div>

  					<div class="form-group col-sm-3">
    					<label class="control-label" for="numext">Número exterior:</label>
    					<dd>{{ $sucursal->numext }}</dd>
  					</div>	

  					<div class="form-group col-sm-3">
    					<label class="control-label" for="numint">Número interior:</label>
    					<dd>{{ $sucursal->numint ? $sucursal->numint : 'N/A' }}</dd>
  					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-3">
  						<label class="control-label" for="colonia">Colonia:</label>
  						<dd>{{ $sucursal->colonia }}</dd>
  					</div>

  					<div class="form-group col-sm-3">
  						<label class="control-label" for="delegacion">Municipio:</label>
  						<dd>{{ $sucursal->delegacion }}</dd>
  					</div>

  					<div class="form-group col-sm-3">
  						<label class="control-label" for="ciudad">Ciudad:</label>
  						<dd>{{ $sucursal->ciudad }}</dd>
  					</div>

  					<div class="form-group col-sm-3">
  						<label class="control-label" for="estado">Estado:</label>
  						<dd>{{ $sucursal->estado }}</dd>
  					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
  						<label class="control-label" for="calle1">Entre calle:</label>
  						<dd>{{ $sucursal->calle1 ? $sucursal->calle1 : 'N/A' }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="calle2">Y calle:</label>
  						<dd>{{ $sucursal->calle2 ? $sucursal->calle2 : 'N/A' }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="referencia">Referencia:</label>
  						<dd>{{ $sucursal->referencia ? $sucursal->referencia : 'N/A' }}</dd>
  					</div>
  				</div>
       		</div>
		</div>
	</div>
</div>

@endsection