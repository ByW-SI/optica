$(obtener_registros());
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function obtener_registros(busqueda, etiqueta)
{

	 
	if (etiqueta == 'query') {
		
		$.ajax({
			//url : "http://localhost/clientes",
			//poner if por cada etiqueta
			url : "buscarcliente",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
	if (etiqueta == 'producto') {
		$.ajax({
			url : "buscarproducto",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
	if (etiqueta == 'empleado') {
		$.ajax({
			url : "buscarempleado",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
	if (etiqueta == 'provedor') {
		
		$.ajax({
			url : "buscarprovedor",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
	// if (etiqueta == 'paciente') {
	// 	$.ajax({
	// 		url : "buscarpaciente",
	// 		type : "GET",
	// 		dataType : "html",
	// 		data :{busqueda:busqueda},
	// 		}).done(function(resultado){
	// 		$("#datos").html(resultado);

	// 	});
	// }
		

}


// $('#pacienteBusqueda').keyup($.debounce(250, function(e) {
// 	var val2 = $('#pacienteBusqueda').val();
// 	$.ajax({
// 		url : "buscarpaciente",
// 		type : "GET",
// 		dataType : "html",
// 		data : {
// 			busqueda:val2
// 		},
// 	}).done(function(resultado){
// 		$("#datos").html(resultado);
// 	});
// }));

// $(document).on('keyup', ':input', function()
// {

// 	var valor=$(this).val();
// 	var etiqueta = $(this).attr('id');


	
// 	if (valor!="")
// 	{
// 		obtener_registros(valor,etiqueta);
// 	}
// 	else
// 	{
// 		obtener_registros(' ',etiqueta);
		
// 	}
// });