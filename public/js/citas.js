$(document).ready(function(){

	

});



function cita()
		{

			//alert('alert');
	var sucursal=document.getElementById('sucursal_clave').value;
    var paciente=document.getElementById('paciente_id').value;
    var cita=document.getElementById('proxima_cita').value;
    var hora=document.getElementById('hora').value;
    var minutos=document.getElementById('minutos').value;
    var comentarios=document.getElementById('comentarios').value;

		  $.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });
		  $.ajax({
		    url: "/cita",
		    type: "POST",
		    dataType: "html",
		    data :{sucursal_clave:sucursal,
		    	   paciente_id:paciente,
		    	   proxima_cita:cita,
		    	   hora:hora,
		    	   minutos:minutos,
		    	   comentarios:comentarios},
		  }).done(function(resultado){
		    $("#todas").html(resultado);
		  });
		}