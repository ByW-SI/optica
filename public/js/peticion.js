$(obtener_registros());
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function obtener_registros(busqueda,etiqueta)
{


	
	$.ajax({
		//url : "http://localhost/clientes",
		url : ""+etiqueta+"",
		type : "GET",
		dataType : "html",
		data :{busqueda:busqueda},
		}).done(function(resultado){
		$("#datos").html(resultado);

	});
}

$(document).on('keyup', ':input', function()
{

	var valor=$(this).val();
	var etiqueta=$(this).attr('id');


	
	if (valor!="")
	{
		obtener_registros(valor,etiqueta);
	}
	else
		{
			obtener_registros("",etiqueta);
			
		}
});