@extends('layouts.blank')
@section('content')
	<div class="container">
		<div class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Punto de venta:</h4>
						</div>
					</div>
				</div>
				<form role="form" method="POST" action="{{ url('pago') }}">
					{{ csrf_field() }}
					<div class="panel-body">
						<div class="row" id="panel_venta">
							<div class="form-group col-sm-3">
								<label class="control-label">
									Fecha:
								</label>
								<input class="form-control" type="date" name="fecha" readonly="" value="{{ date('Y-m-d')}}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Sucursal:
								</label>
								<select name="sucursal_id" id="sucursal"  onchange="getSucursal(this)" class="form-control">
									<option value="">Seleccione la sucursal</option>
									@foreach ($sucursales as $sucursal)
										<option value="{{$sucursal->claveid}}">{{$sucursal->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Número de venta:
								</label>
								<input class="form-control" type="text" name="ticket" readonly="" id="ticket">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									ID:
								</label>
								<input class="form-control" type="text" name="id" id="id_paciente" required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Tipo convenio:
								</label>
								<select class="form-control" size="1" name="tipo_convenio" id="TConvenio" onchange="showTipoConvenio(this)">
									<option value="particular">Particular</option>
									<option value="convenio">Con convenio</option>
								</select> 
							</div>
						</div>
					</div>
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h4>Punto de venta:</h4>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="control-label">
									Productos:
								</label>
								<div class="input-group">
								  <input type="text" class="form-control" id="search_productos" placeholder="Buscar producto" aria-describedby="basic-addon2">
								  <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
								</div>
								<br>
							</div>
						</div>
						<div class="row" id="descripcion">
						</div>
						<div class="row">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr class="info">
										<th>
											SKU
										</th>
										<th>
											Marca
										</th>
										<th>
											Categoria
										</th>
										<th>
											Descripción
										</th>
										<th>
											Precio
										</th>
										<th>
											Cantidad
										</th>
										<th>
											Total de producto
										</th>
									</tr>
								</thead>
								<tbody id="myProd"></tbody>
							</table>
						</div>

						<div class="row">
							<div class="form-group col-sm-6">
								<label class="control-label">
									Descuentos:
								</label>
								<div class="input-group">
								  <input type="text" class="form-control" id="search_convenios" placeholder="Buscar descuentos" aria-describedby="basic-addon2">
								  <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
								</div>
								<br>
							</div>
						</div>
						<div class="row" id="descconvenio">
						</div>
						<br>
						<div class="row">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr class="info">
										<th>
											Empresa
										</th>
										<th>
											Convenio
										</th>
										<th>
											Descripción
										</th>
										<th>
											Aplican
										</th>
										<th>
											Descuento
										</th>
										<th>
											Número de productos
										</th>
										<th>
											Valido de 
										</th>
									</tr>
								</thead>
								<tbody id="myConvenios"></tbody>
							</table>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Fecha de entrega:</span>
								  <input type="date" name="fecha" class="form-control" min="{{date('Y-m-d')}}" id="fecha" aria-describedby="basic-addon1" required="">
								</div>
							</div>
							<div class="col-sm-offset-4 col-sm-4">
								<div class="form-group">
								  <span class="align-span" id="basic-addon1">Subtotal: $</span><input type="number" name="subtotal" readonly="" class="align-input" id="subtotal" aria-describedby="basic-addon1">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-offset-8 col-sm-5">
								<div class="form-group">
								  <span class="align-span" id="basic-addon1">IVA: $</span><input type="number" name="iva" readonly="" class="align-input" id="iva" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="col-sm-offset-8 col-sm-5">
								<div class="input-group">
								  <span class="align-span" id="basic-addon1">Total: $</span><input type="number" name="total" readonly="" class="align-input" id="total" aria-describedby="basic-addon1" onchange="setFalta()">
								</div>
							</div>
							<div class="col-sm-offset-8 col-sm-5">
								<div class="input-group">
								  <span class="align-span" id="basic-addon1">Convenio: </span><input type="text" name="convenio" class="align-input" id="convenio_total" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="col-sm-offset-8 col-sm-5">
								<div class="input-group">
								  <span class="align-span">Total a pagar: $</span><input type="number" name="falta" class="align-input" readonly="" id="falta" aria-describedby="basic-addon1">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#gridSystemModal">
				  				<i class="fa fa-check-circle"></i> Pagar
				  			</button>
						</div>
					</div>
					<!-- ####### MODAL #####-->
					<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="gridSystemModal">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="gridSystemModalLabel">Punto de venta</h4>
					      </div>
					      <div class="modal-body">
					        <div class="row">
					          <div class="col-sm-9">
					            <h3>¿Estas seguro?</h3>
					          </div>
					        </div>
					      </div>
					      <div class="modal-footer">
					        <div class="row">
					        	<div class="col-sm-9">
					        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					        		<button type="submit" class="btn btn-primary">Si</button>
					        	</div>
					        </div>
					      </div>
					    </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</form>
			</div>
		</div>
	</div>
@endsection
@section('script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		function setFalta(){
			var falta = $("#total").val();
			$('#falta').val(falta);
			/*
			aqui tengo que restar el monto del convenio si es que hay convenio si no se pasa igual al total
			*/
			$("#falta").val(falta);
		}
		function getSucursal(sel){
			ticket = sel.value+"000001"
			$("#ticket").val(ticket);
		}
		
		$(function () {

	    	var productos =[
	    		@foreach ($productos as $producto)
	    			{
	    				label:"{{$producto->descripcion}} ${{$producto->precio}}",
	    				producto:@json($producto),
	    			},
	    		@endforeach
	    	];
	    	var convenios =[
	    		@foreach ($tipoconvenios as $convenio)
	    			@if($convenio->desc_prod)
		    			{
		    				label:"{{$convenio->convenio->razonsocial ? $convenio->convenio->razonsocial : $convenio->convenio->nombre.' '.$convenio->convenio->apellidopaterno }}, {{$convenio->nombre}}",
		    				convenio:@json($convenio),
		    			},
	    			@endif
	    		@endforeach
	    	];
	    	console.log(convenios);
	    	var pacientes =[
	    		@foreach ($pacientes as $paciente)
	    			@if($paciente->identificador)
		    			{
		    				label:"{{$paciente->identificador}}",
		    				convenio:@json($paciente),
		    			},
	    			@endif
	    		@endforeach
	    	];
	    	//console.log(convenios);
		    $("#search_productos").autocomplete({
		        source: productos,
		        minLength: 0,
		        select:function (event,ui) {
		        	showProducto(ui);
		        	$("#search_productos").value("");
		        }
		    }).click(function () {
		        $(this).autocomplete('search')
		    });
		    $('#search_convenios').autocomplete({
		        source: convenios,
		        minLength: 0,
		        select:function (event,ui) {
		        	showConvenios(ui);
		        	$('#search_convenios').value("");
		        }
		    }).click(function () {
		        $(this).autocomplete('search')
		    });

		    $('#id_paciente').autocomplete({
		    	source: pacientes,
		    	minLength: 0,
		    	select:function(event,ui) {
		    		$('#id_paciente').val(ui);
		    	}
		    }).click(function () {
		        $(this).autocomplete('search')
		    });
		});

		function showProducto(element) {
			var stringproducto=JSON.stringify(element.item.producto);
			$("#descripcion").empty();
			$("#search_productos").val("");
			$("#descripcion").append(`
				<div class="form-group col-sm-4">
					<label class="control-label">
						SKU:
					</label>
					<label class="form-control">
						${element.item.producto.sku}
					</label>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">
						Marca:
					</label>
					<label class="form-control">
						${element.item.producto.marca}
					</label>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">
						Modelo:
					</label>
					<label class="form-control">
						${element.item.producto.modelo}
					</label>
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">
						Descripción:
					</label>
					<label class="form-control">
						${element.item.producto.descripcion}
					</label>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">
						Precio:
					</label>
					<label class="form-control">
						$${element.item.producto.precio}
					</label>
				</div>
				<div class="form-group col-sm-3">
					<a href="#" onclick='addProducto(${stringproducto})' class="btn btn-success">
                        Agregar
                    </a>
				</div>
				`);
		}
		function showConvenios(element) {
			console.log(element);
			var stringconvenio=JSON.stringify(element.item.convenio);
			$("#descconvenio").empty();
			$("#search_convenios").val("");
			$("#descconvenio").append(`
				<div class="form-group col-sm-3">
					<label class="control-label">
						Nombre:
					</label>
					<label class="form-control">
						${element.item.convenio.nombre}
					</label>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">
						Descripción:
					</label>
					<label class="form-control">
						${element.item.convenio.descripcion}
					</label>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">
						Descuento:
					</label>
					<div class="input-group">
					 	<label class="form-control">
							${element.item.convenio.desc_prod}
						</label>
					  	<span class="input-group-addon" id="basic-addon2">%</span>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">
						Número de productos:
					</label>
					<label class="form-control">
						${element.item.convenio.num_prod}
					</label>
				</div>
				<div class="form-group col-sm-3">
					<a href="#" onclick='addConvenio(${stringconvenio})' class="btn btn-success">
                        Agregar
                    </a>
				</div>
				`);
		}
		function addProducto(producto) {
			// body...
			//console.log(producto);


			var rowHTML=
			`<tr id="row${producto.id}">
				<td>${producto.sku}</td>
				<td>${producto.marca}</td>
				<td>${producto.categoria}</td>
				<td>${producto.descripcion}</td>
				<td id="precio${producto.id}" class="precio">${producto.precio}</td>
				<td>
					<div class="input-group">
					  <span class="input-group-addon">Cantidad</span>
					  <input type="number" min="1" step="1" value="1" onchange="setTotalP(${producto.id},${producto.precio},this)" class="form-control">
					  <span class="input-group-addon">Piezas</span>
					</div>
				</td>
				<td>
					<div class="input-group">
					  	<span class="input-group-addon">Total:$</span>
					  	<input type="number" min="1" step="1" value="${producto.precio}" id="total${producto.id}" class="form-control total-prod" readonly>
				  		<span class="btn btn-danger input-group-addon" onclick="removeProducto('row${producto.id}')">
                       		<i class="fa fa-trash" aria-hidden="true"></i>
                       	</span>
					</div>
				</td>
			</tr>`;
			$('#myProd').append(rowHTML);
			setTotal();
		}
		function setTotal(){
			var total =0;
			var iva = 0;
			var subtotal=0;
			$(".total-prod").each(function(index){
				subtotal = subtotal +($(this).val()*0.84);
				iva = iva + ($(this).val()*0.16);
				total = total + $(this).val();
			});
			$("#subtotal").val(subtotal);
			$("#iva").val(iva);
			$("#total").val(total);
		}
		function addConvenio(convenio) {
			// body...
			//console.log(convenio);
			$(".total-prod").each(function(index){
				if(index+1 <= convenio.num_prod){
					total_desc = $(this).val()-($(this).val()*(convenio.desc_prod/100)); 
					console.log($(this).val(total_desc));
				}
				setTotal();
			})

			if(convenio.convenio.tipopersona == "Moral"){
				var empresa = convenio.convenio.razonsocial;
			}
			else{
				var empresa = convenio.convenio.nombre+" "+convenio.convenio.apellidopaterno;
			}

			var rowHTML=
			`<tr id="convenio${convenio.id}">
				<td>${empresa}</td>
				<td>${convenio.nombre}</td>
				<td>${convenio.descripcion}</td>
				<td>${convenio.aplican}</td>
				<td id="descuento${convenio.id}">${convenio.desc_prod}%</td>
				<td id="num_prodDesc${convenio.id}">${convenio.num_prod}</td>
				<td>
					<div class="input-group">
					  	<input type="date" value="${convenio.valido_inicio}" class="form-control" readonly>
					  	<span class="input-group-addon"> a </span>
					  	<input type="date" value="${convenio.valido_fin}" class="form-control" readonly>
				  		<span class="btn btn-danger input-group-addon" onclick="removeProducto('convenio${convenio.id}')">
                       		<i class="fa fa-trash" aria-hidden="true"></i>
                       	</span>
					</div>
				</td>
			</tr>`;
			$('#myConvenios').append(rowHTML);
		}
		function removeProducto(id){
			$(`#${id}`).remove();
		}
		function setTotalP(id,precio,cantidad){
			total = precio*cantidad.value;
			$(`#total${id}`).val(total);
			setTotal();
		}

		function showTipoConvenio(select) {
			if ($(select).val() == "convenio") {
				$.ajax({
					url : "getconvenio",
					type : "GET",
					dataType : "json",
					data : {
						query : 'text',
						seccion : 'sec'
					},
				}).done(function(data) {
					var option = '' ;
					for (var i = 0; i < data.convenios.length; i++) 
						option += `<option value="${data.convenios[i].nombre} ${data.convenios[i].apellidopaterno}">${data.convenios[i].nombre} ${data.convenios[i].apellidopaterno}</option>`;

					convenios = `<div class="form-group col-sm-3" id="tramites">
									<label class="control-label">
										Cantidad de trámites:
									</label>
									<input class="form-control" type="number" step="1" min="1" name="tramites" required>
								</div>
								<div class="form-group col-sm-3" id="autorizacion">
									<label class="control-label">
										Número de autorización:
									</label>
									<input class="form-control" type="text" name="autorizacion" required>
								</div>
								<div class="form-group col-sm-3" id="personal">
									<label class="control-label">
										Personal:
									</label>
									<select class="form-control" size="1" name="convenios_all" id="personal" required>
										<option value="Docente">Docente</option>
										<option value="Administrativo">Administrativo</option>
										<option value="Jubilado">Jubilado</option>
										<option value="Dependiente de Docente">Dependiente de Docente</option>
										<option value="Dependiente Administrativo">Dependiente Administrativo</option>
									</select>
								</div>
								<div class="form-group col-sm-3" id="convenios">
									<label class="control-label">
										Convenio:
									</label>
									<select class="form-control" size="1" name="convenios_all" id="Convenio" onchange="setConveniofinal()">
										<option value="">Seleccionar --</option>
										${option}
									</select> 
								</div>`;
						$('#panel_venta').append(convenios);
				}).fail(function(data){
					console.log('Fail' + data);
				});			
			}
			else if ($(select).val() == "particular") {
				$('#convenios').remove();
				$('#autorizacion').remove();
				$('#tramites').remove();
				$('#personal').remove();
				$('#convenio_total').val("");
			}
		}

		function setConveniofinal(){
			$('#convenio_total').val("");
			var contenido = $('#Convenio option:selected').val();
			console.log(contenido);
			$('#convenio_total').val(contenido);
		}
	</script>
	<style type="text/css">
		.align-span{
			width: 130px;
			display: inline-block;
			padding: 10px 0px 10px 12px;
			text-align: center;
			background-color: #eee; 
			line-height: 1;
			border: 1px solid #ccd0d2;
			border-radius: 4px;
			border-bottom-right-radius: 0;
			border-top-right-radius: 0;
		}
		.align-input{
			width: 200px;
			padding: 6px 12px 6px 12px;
			border-radius: 4px;
			background-color: #eee;
			border: 1px solid #ccd0d2;
			border-bottom-left-radius: 0;
			border-top-left-radius: 0;
		}
		.form-group{
			margin-bottom: 0px;
		}
	</style>
@endsection