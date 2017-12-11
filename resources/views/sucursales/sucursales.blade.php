@extends('layouts.test')
@section('content')



<div class="container" align="left">
	<form>

			 <div class="container well well-lg">
			 	<h4> <strong>Sucursales</strong></h4>
			 	 <br /><br />
			   <div class="col-sm-4">
			 		<h5>Nombre Sucursal
			 			<i class="fa fa-font" aria-hidden="true"></i>
			 		</h5>
			 		<input type="text" name="nombre" class="form-control" placeholder="Nombre de la Sucursal" pattern="[A-Za-z]+" autofocus="on">
			 	
      			

			 	</div>
	    		
	    	 <div class="col-sm-4">
	    		<h5>Responsable
	    			<i class="fa fa-user" aria-hidden="true"></i>
	    		</h5>
	    		<input type="text" name="responsable" class="form-control" placeholder="Nombre del Responsable" pattern="[A-Za-z]+">
	    	 </div>

	    		<div class="col-sm-4">
	    			<h5>ID Sucursal
	    				<i class="fa fa-bookmark" aria-hidden="true"></i>
	    			</h5><input type="text" name="id_sucursal" class="form-control" placeholder="Clave ID">
	    		</div>	<br /><br /><br /><br />

	    		<div class="col-sm-4">
	    			<h5><strong>Región</strong>
	    				<i class="fa fa-map-o" aria-hidden="true"></i>
	    			</h5> <select name="region">
 							 <option value="region1"> Región 1 zona </option>
  							 <option value="region2"> Región 2 zona </option>
  							 <option value="region3"> Región 3 zona </option>
  							 <option value="region4"> Región 4 zona </option>
  							 <option value="region4"> Región 5 zona </option>
							</select> 
	    		</div><br /><br />

	    		<div class="col-sm-4">
	    			<div class="input-group">
	    			<button type="submit" name="submit" value="Ingresar">
	    				<strong>
	    					Buscar
	    					<i class="fa fa-search" aria-hidden="true"></i>
	    				</strong>
	    				
	    					
	    			</button>
	    			
	    			 </div>
	    		</div>	
	    	
	    	
	    	
	    </div>
		
	</form>
<!--********************************************************************************************-->
					<div class="container well well-lg">
						<div class="container">
							<strong><h4>Resultado de la Consulta <i class="fa fa-television" aria-hidden="true"></i></h4></strong>
  <br />
  								  <ul class="nav nav-pills ">

    <li class="active">
    	<a data-toggle="tab" href="#dir">Direcciòn  
    		<i class="fa fa-map-signs" aria-hidden="true"></i>
    	</a>
    </li>

    <li>
    	<a data-toggle="tab" href="#gas">Gastos
    		<i class="fa fa-money" aria-hidden="true"></i>
    	</a>

    </li>

    <li><a data-toggle="tab" href="#emp">Empleados
    	<i class="fa fa-address-card-o" aria-hidden="true"></i>
       </a>
   </li>
    
  </ul>


  	<div class="tab-content">
		<div id="dir" class="tab-pane fade in active">
    	<br>
      

      		<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"> Calle:</label>
			    					<input type="text" class="form-control" id="calle" name="calle" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"> Numero exterior:</label>
			    					<input type="text" class="form-control" id="numext" name="numext" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Numero interior:</label>
			    					<input type="text" class="form-control" id="numinter" name="numinter">
			  					</div>
			  					
							</div>

								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"> Colonia:</label>
			  						<input type="text" class="form-control" id="colonia" name="colonia" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio"> Delegación o Municipio:</label>
			  						<input type="text" class="form-control" id="municipio" name="municipio" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"> Ciudad:</label>
			  						<input type="text" class="form-control" id="ciudad" name="ciudad" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"> Estado:</label>
			  						<input type="text" class="form-control" id="estado" name="estado" required>
			  					</div>
							</div>


								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<input type="text" class="form-control" id="calle1" name="calle1">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<input type="text" class="form-control" id="calle2" name="calle2">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<input type="text" class="form-control" id="referencia" name="referencia">
			  					</div>
							</div>


    </div>
							 	
<div id="gas" class="tab-pane fade in active">
      <h3>Gastos</h3>
      @yield('gastos')
    </div>



							 </div>








						</div>
					</div>	





<!--********************************************************************************************-->	
</div>

@endsection