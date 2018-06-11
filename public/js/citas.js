$(document).ready(function(){

	

});



function cita()
		{

			
	var sucursal=document.getElementById('sucursal').value;
    var paciente=document.getElementById('paciente_id').value;
    var cita=document.getElementById('proxima_cita').value;
    var hora=document.getElementById('hora').value;
    var minutos=document.getElementById('minutos').value;
    var comentarios=document.getElementById('comentarios').value;

if(sucursal==null||sucursal=='sin_definir'||cita==null||cita==''||hora==null||hora==''||minutos==null||minutos==''){
	
	alert('Por favor llene todos los campos obligatorios (*)');
}else{
		  $.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });
		  $.ajax({
		    url: 'http://byw.from-tn.com/optica/cita',//esta ruta espra el servidor, cambiará para localhost
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

		  alert('-- Se ha cargado un Nuevo Registro de Cita--');
		}
	}


