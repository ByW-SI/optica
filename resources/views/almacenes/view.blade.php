@extends('layouts.test')
@section('content1')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- scripts --}}
	<div class="container">
		

			<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Datos del Almacen:</h4>
					
					<a class="btn btn-info" href="{{ route('almacens.index') }}"><strong>Ver Almacenes</strong></a>
					<a class="btn btn-success" href="{{ route('almacens.create') }}"><strong>Nuevo Almacen</strong></a>
					<a class="btn btn-warning" href="{{ route('almacens.edit',['almacen'=>$almacen->id]) }}">
								
								 <strong>Editar</strong>
							</a>
				</div>

				<div class="panel-body">
					<div class="col-xs-12 offset-md-2 mt-3">

						<div class="form-group col-xs-4">
							<label class="control-label" for="nombre"> Nombre:</label>
							<dd>{{ $almacen->nombre }}</dd>
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="responsable"> Responsable :</label>
							<dd>{{ $almacen->responsable }}</dd>
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="claveid"> Clave ID :</label>
							<dd>{{ $almacen->claveid }}</dd>
						</div>


					</div>


					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
						<label class="control-label" for="tipo">Tipo de Almacen:</label>
			    					<dd>{{ $almacen->tipo }}</dd>
						</div>

						


					</div>
					
				   </div>


				</div>

			</div>



	<ul class="nav nav-pills ">
								<li class="active">
    				<a data-toggle="tab" 
    				   href="#dir" 
    				   class="btn-info">Dirección</a>
    							</li>
								<li>
    				<a data-toggle="tab" 
    	   				href="#gas" 
    	   				class="btn-info">Gastos
    		
    				</a>
								</li>

                                 <li>
    	           <a data-toggle="tab" 
    	              href="#emp" 
    	              class="btn-info">Empleados</a>
   									</li>
    
  					</ul>

  <div class="tab-content">
<div id="dir" class="tab-pane fade in active">
<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Direcciòn de Almacen :
					
					 
				</h4></div>

                  
                   <div class="panel-body">
                   






                   
  
			
			 	
    	
      

      		<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"> Calle:</label>
			    					<dd>{{ $almacen->calle }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"> Numero exterior:</label>
			    					<dd>{{ $almacen->numext }}</dd>
			  					</div>	

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<dd>{{ $almacen->numint }}</dd>
			  					</div>


			  				




							</div>

								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"> Colonia:</label>
			  						<dd>{{ $almacen->colonia }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="delegacion"> Delegación o Municipio:</label>
			  						<dd>{{ $almacen->delegacion }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"> Ciudad:</label>
			  						<dd>
			  						{{ $almacen->ciudad }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"> Estado:</label>
			  						<dd>{{ $almacen->estado }}</dd>
			  					</div>
							</div>


								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<dd>{{ $almacen->calle1 }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd>{{ $almacen->calle2 }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd>{{ $almacen->referencia }}</dd>
			  					</div>
			  					





 



  	
  </div>
             

                   </div>



					
				</div>
			</div>
		</div>


 <div id="gas" class="tab-pane fade ">
    	<iframe src="{{route ('gastos.create',['almacen'=>$almacen->id])}}"
    			height="500px" >
    		
    	</iframe>
    </div>


    <div id="emp" class="tab-pane fade ">
    	<iframe src="{{route ('almacen.index',['almacen'=>$almacen])}}"
    			height="500px" >
    		
    	</iframe>
    </div>




       </div>



	  
	</div>
@endsection