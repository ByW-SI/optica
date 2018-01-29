@extends('layouts.test')
	@section('content1')
		<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
			<form role="form" id="form-cliente" method="POST" action="{{ route('convenios.store') }}" name="form">
				{{ csrf_field() }}
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Convenio:
						&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h4>
						</div>
						<div class="panel-body">
							<div class="col-xs-4 col-xs-offset-8">
									<button type="submit" 
									        class="btn btn-success">
									 <strong>Guardar</strong>
								</button>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<a class="btn btn-info" 
								   href="{{ route('convenios.create') }}">
								<strong>Agregar Nuevo</strong> </a>
									
							</div>	<br><br><br>
							<div class="col-md-12 offset-md-2 mt-3">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
			    						<option id="Fisica" value="Fisica">Fisica</option>
			    						<option id="Moral" value="Moral">Moral</option>
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="alias"><i class="fa fa-asterisk" aria-hidden="true"></i> Alias:</label>
			  						<input type="text" 
			  						       class="form-control" 
			  						       id="alias" 
			  						       name="alias" 
			  						       required 
			  						       autofocus>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc"><i class="fa fa-asterisk" aria-hidden="true"></i> RFC:</label>
			  						<input type="text" class="form-control" id="varrfc" name="rfc" required minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Vendedor:</label>
			  						<input type="text" class="form-control" id="vendedor" name="vendedor">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
			  						<input type="text" class="form-control" id="nombre" name="nombre">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial"><i class="fa fa-asterisk" aria-hidden="true"></i> Razon Social:</label>
			  						<input type="text" class="form-control" id="razonsocial" name="razonsocial">
			  					</div>
							</div>

						</div>
					</div>
					<div role="tab-panel">
						
					<ul class="nav nav-tabs" id="mytab" role="tab-list">
						<li  role="presentation" class="active"><a role="tab"  aria-controls="fisica" data-toggle="tab" href="#fisica">Dirección Fisica:</a></li>
						<li  role="presentation"><a role="tab"  aria-controls="fiscal" data-toggle="tab" href="#fiscal">Dirección Fiscal:</a></li>
						<li  role="presentation"><a role="tab"  aria-controls="contactos" data-toggle="tab" href="#contactos">Contacto:</a></li>
						<li  role="presentation"><a role="tab"  aria-controls="tipo" data-toggle="tab" href="#tipo">Tipo de Convenio:</a></li>
						
					</ul>


					<div class="tab-content">
						
					{{-- DIRECCIÓN FISICA --}}
					<div class="tab-pane active fade in active"  role="tabpanel" id="fisica">
					<div class="panel panel-default">
						<div class="panel-heading">Dirección Fisica:
							&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos
						</div>
						<div class="panel-body">
							<div class="col-xs-2 col-xs-offset-10">
									
									
							</div>	
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
			    					<input type="text" class="form-control" id="calle" name="calle" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
			    					<input type="text" class="form-control" id="numext" name="numext" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Numero interior:</label>
			    					<input type="text" class="form-control" id="numinter" name="numinter">
			  					</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
			  						<input type="text" class="form-control" id="colonia" name="colonia" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
			  						<input type="text" class="form-control" id="municipio" name="municipio" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
			  						<input type="text" class="form-control" id="ciudad" name="ciudad" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
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
						</form>
					</div>
					</div>

<div   role="tabpanel" id="fiscal" class="tab-pane fade in">
	
			{{-- DATOS FISCALES --}}
			<div class="panel panel-default" id="datosfiscales">
			 <input type="hidden" name="convenio_id" value="{{-- {{$convenio->id}} --}}">
			 <div class="panel-default">
				<div class="panel-heading">Dirección Fiscal:
				&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
				<div class="panel-body">
						<div class="col-lg-offset-10">
							<button type="submit" class="btn btn-success">
								<strong> Guardar
							</strong></button>
							
						</div>
						<div class="boton checkbox-disabled">
							<label>

								<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" {{-- onchange="datosFiscal();" --}}>
								¿Usar datos de dirección fisica?.
							</label>
						</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="" autofocus required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="" required>
	  					</div>	
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numint">Numero interior:</label>
	    					<input type="text" class="form-control" id="numint" name="numint" value="">
	  					</div>		
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="" required>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						{{-- <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código postal:</label>
			    					<input type="text" class="form-control" id="cp" name="cp"  minlength="5" maxlength="5">
			  					</div> --}}		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="">
	  					</div>
					</div>
				</div>
			</div>
			</div>
</div>

<div   role="tabpanel" id="contactos" class="tab-pane fade in">
	
			{{-- CONTACTOS --}}
			<div class="panel panel-default" id="contactos">
				<div class="panel-heading">Contacto:
				&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
					<div class="panel-body">
							{{ csrf_field() }}
							<input type="hidden" name="convenio_id" value="{{-- {{$convenio->id}} --}}" required>
							<div class="col-xs-offset-10">
								<button type="submit" class="btn btn-success">
							<strong>Guardar</strong>	</button>
								
							</div>	
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
			    					<input type="text" class="form-control" id="nombre" name="nombre" value="" required autofocus>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="apater"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido paterno:</label>
			    					<input type="text" class="form-control" id="apater" name="apater" value="" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="amater">Apellido materno:</label>
			    					<input type="text" class="form-control" id="amater" name="amater" value="">
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="area">Área:</label>
			  						<input type="text" class="form-control" id="area" name="area" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="puesto">Puesto:</label>
			  						<input type="text" class="form-control" id="puesto" name="puesto" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  							<label class="control-label" for="telefono1">Telefono:</label>
			  						<input type="text" class="form-control" id="telefono1" name="telefono1" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext1">Extensión:</label>
			  						<input type="text" class="form-control" id="ext1" name="ext1" size="6" value="">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono2">Telefono :</label>
			  						<input type="text" class="form-control" id="telefono2" name="telefono2" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext2">Extensión:</label>
			  						<input type="text" class="form-control" id="ext2" name="ext2" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefonodir"><i class="fa fa-asterisk" aria-hidden="true"></i> Telefono directo:</label>
			  						<input type="text" class="form-control" id="telefonodir" name="telefonodir" value="" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular1">Celular:</label>
			  						<input type="text" class="form-control" id="celular1" name="celular1" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular2">Celular:</label>
			  						<input type="text" class="form-control" id="celular2" name="celular2" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email1"><i class="fa fa-asterisk" aria-hidden="true"></i> Correo electronico:</label>
			  						<input type="email" class="form-control" id="email1" name="email1" value="" required>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email2">Correo electronico:</label>
			  						<input type="email" class="form-control" id="email2" name="email2" value="">
			  					</div>
							</div>
							
						
					</div>
			</div>
</div>

<div   role="tabpanel" id="tipo" class="tab-pane fade in">
			{{-- TIPO DE CONVENIO --}}
			<div class="panel panel-default" id="convenio">
				<div class="panel-heading"> Tipo de Convenio:
				&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
				<div class="panel-body">
					<form> {{-- por agregar información --}}
						{{ csrf_field() }}
						<input type="hidden" name="convenio_id" value="{{-- {{$convenio->id}} --}}" {{-- required --}}>
						<div class="col-xs-offset-10">
								<button type="submit" class="btn btn-success">
							<strong>Guardar</strong>	</button>
								
						</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="desc_prod"> Descuento por producto:</label>
		    					<div class="input-group">
		    					<input type="number" class="form-control" id="desc_prod" name="desc_prod" value=""><span class="input-group-addon">%</span>
		    					</div>
		    				</div>
		    				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="num_prod"> Número de producto(s) por año:</label>
		    					<div class="input-group">
		    					<span class="input-group-addon">#</span><input type="number" class="form-control" id="num_prod" name="num_prod" value="">
		    					</div>
		    				</div>
		    				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    					<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre del convenio:</label>
		    					
		    					<textarea class="form-control" name="nombre" id="nombre"></textarea>
		    				</div>
		    				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="desc_cita"> Descuento por cita:</label>
		    					<div class="input-group">
		    					<input type="number" class="form-control" id="desc_cita" name="desc_cita" value=""><span class="input-group-addon">%</span>
		    					</div>
		  					</div>
		    				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="num_prod"> Número de cita(s) por año:</label>
		    					<div class="input-group">
		    					<span class="input-group-addon">#</span><input type="number" class="form-control" id="num_prod" name="num_prod" value=""></div>
		    				</div>
		    				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    					<label class="control-label" for="descripcion"><i class="fa fa-asterisk" aria-hidden="true"></i> Descripción del convenio:</label>
		    					
		    					<textarea class="form-control" name="descripcion" id="descripcion"></textarea>
		    				</div>
		    				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="valido_inicio"> Valido de:</label>
		    					<input type="date" class="form-control" id="valido_inicio" name="valido_inicio" value="">
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="valido_fin"> Valido hasta:</label>
		    					<input type="date" class="form-control" id="valido_fin" name="valido_fin" value="">
		  					</div>

		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="aplican"> ¿A quién aplica?:</label>
		    					<input type="text" class="form-control" id="aplican" name="aplican" value="">
		  					</div>
					</form>
				</div>
		  					<div class="jumbotron">
		  						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
									<thead>
										<tr class="info">
											<th>Nombre</th>
											<th>Descuento</th>
											<th>Numero de citas (por año)</th>
											<th>Valido de</th>
											<th>Hasta</th>
											<th>Operacion</th>
										</tr>
									</thead>
		  							<tbody>
		  								<tr class="active" title="Haz click aquí para ver/editar" style="cursor: pointer;">
		  									<td>Convenio 1</td>
		  									<td>50%</td>
		  									<td>3 citas</td>
		  									<td>01/12/2017</td>
		  									<td>02/02/2018</td>
		  									<td>
		  										<a class="btn btn-success btn-sm" href="#"><i class="fa fa-eye" aria-hidden="true"></i><strong>Ver</strong></a>

												<a class="btn btn-info btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong>Editar</strong></a>
		  									</td>
		  								</tr>
		  								<tr class="active" title="Haz click aquí para ver/editar" style="cursor: pointer;">
		  									<td>Convenio 2</td>
		  									<td>75%</td>
		  									<td>2 citas</td>
		  									<td>29/01/2018</td>
		  									<td>29/12/2018</td>
		  									<td>
		  										<a class="btn btn-success btn-sm" href="#"><i class="fa fa-eye" aria-hidden="true"></i><strong>Ver</strong></a>

												<a class="btn btn-info btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong>Editar</strong></a>
											</td>
		  								</tr>
									
									</tbody>
								</table>
		  					</div>
			</div>
	
</div>
					</div>
					</div>
						
					</div>

					
  				</div>
		</div>
		<script>
		$('#mytab a').click(function (e) {
     e.preventDefault()
     $('div#tab-pane').tab('hidden');
     $(this).tab('show');
   })
  
		</script>
	@endsection
	
