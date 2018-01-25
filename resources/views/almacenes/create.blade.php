@extends('layouts.test')
@section('content1')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- scripts --}}
	<div class="container">
		@if ($edit == true)
		{{-- true expr --}}
		<form role="form" method="POST" action="{{ route('almacens.update',['almacen'=>$almacen]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
	@else
		{{-- false expr --}}
		<form role="form" id="form-almacen" method="POST" action="{{ route('almacens.store') }}" name="form">
			{{ csrf_field()}}
	@endif

			<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Datos del Almacen:
					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="btn btn-info" href="{{ route('almacens.index') }}"><strong>Ver Almacenes</strong></a>
				</h4></div>

				<div class="panel-body">
					<div class="col-xs-12 offset-md-2 mt-3">

						<div class="form-group col-xs-4">
							<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre:</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{ $almacen->nombre }}" placeholder="Nombre de Almacen">
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="responsable"><i class="fa fa-asterisk" aria-hidden="true"></i> Responsable :</label>
							<input type="text" class="form-control" id="responsable" name="responsable" required="required" value="{{ $almacen->responsable }}" placeholder="Nombre del Responsable">
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="claveid"><i class="fa fa-asterisk" aria-hidden="true"></i> Clave ID :</label>
							<input type="text" class="form-control" id="claveid" name="claveid" required="required" value="{{ $almacen->claveid }}" placeholder="ID de Almacen">
						</div>


					</div>


					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
						<label class="control-label" for="tipo">Tipo del Almacen:</label>
			    					<select type="select" 
			    					        name="tipo" 
			    					        class="form-control" 
			    					        id="tipo" >
			    					        
			    					<option id="Central" value="Central" @if ($almacen->tipo == "Central")
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Central</option>
			    					<option id="Vitrina" value="Vitrina" @if ($almacen->tipo == "Vitrina")
			    							{{-- expr --}}
			    							selected="selected" 
			    						@endif>Vitrina</option>
			    					



			    					</select>
						</div>

						


					</div>
					
				   </div>


				</div>

			</div>


<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Direcciòn de Almacen :
					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos&nbsp;&nbsp;
					<!-- <a class="btn btn-info" href="{{ route('almacens.create') }}"><strong>Nueva Almacen</strong></a> -->
				</h4></div>

                  
                   <div class="panel-body">
                   




  
			
			 	 <br />
    	
      

      		<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
			    					<input type="text" 
			    					      class="form-control" 
			    					      id="calle" 
			    					      name="calle"
			    					      value="{{ $almacen->calle }}" 
			    					      required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
			    					<input type="text" 
			    					       class="form-control" 
			    					       id="numext" 
			    					       name="numext"
			    					       value="{{ $almacen->numext }}" 
			    					       required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<input type="text" 
			    					       class="form-control" 
			    					       id="numint" 
			    					       name="numint"
			    					       value="{{ $almacen->numint }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" align="right">
							<button type="submit" 
									        class="btn btn-success">
									 <strong>Guardar</strong>
								</button>
						


    </div>
							</div>

								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
			  						<input type="text" 
			  						class="form-control" 
			  						id="colonia" 
			  						name="colonia"
			  						value="{{ $almacen->colonia }}" 
			  						required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="delegacion"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
			  						<input type="text" 
			  						class="form-control" 
			  						id="delegacion" 
			  						name="delegacion"
			  						value="{{ $almacen->delegacion }}" 
			  						required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"> <i class="fa fa-asterisk" aria-hidden="true"></i>Ciudad:</label>
			  						<input type="text" 
			  						class="form-control" 
			  						id="ciudad" 
			  						name="ciudad"
			  						value="{{ $almacen->ciudad }}" 
			  						required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"> <i class="fa fa-asterisk" aria-hidden="true"></i>Estado:</label>
			  						<input type="text" 
			  						class="form-control" 
			  						id="estado" 
			  						name="estado"
			  						value="{{ $almacen->estado }}" 
			  						required>
			  					</div>
							</div>


								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<input type="text" 
			  						class="form-control" 
			  						id="calle1" 
			  						name="calle1"
			  						value="{{ $almacen->calle1 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<input type="text" 
			  						class="form-control" 
			  						id="calle2" 
			  						name="calle2"
			  						value="{{ $almacen->calle2 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<input type="text" 
			  						class="form-control" 
			  						id="referencia" 
			  						name="referencia"
			  						value="{{ $almacen->referencia }}">
			  					</div>
			  					





 



  	
  </div>
             

                   </div>



					
				</div>
			</div>




	  </form>
	</div>
@endsection