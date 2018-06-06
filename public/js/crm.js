function crm(elemento){
				document.getElementById("fecha_cont").value = elemento.fecha_cont;
				document.getElementById("fecha_cont").disabled = true;
				document.getElementById("fecha_aviso").value = elemento.fecha_aviso;
				document.getElementById("fecha_aviso").disabled = true;
				document.getElementById("hora").value = elemento.hora;
				document.getElementById("hora").disabled = true;
				document.getElementById("tipo_cont").value = elemento.tipo_cont;
				document.getElementById('tipo_cont').disabled = true;
				document.getElementById('status').value = elemento.status;
				document.getElementById('status').disabled = true;
				document.getElementById('acuerdos').value = elemento.acuerdos;
				document.getElementById('acuerdos').disabled = true;
				document.getElementById('comentarios').value = elemento.comentarios;
				document.getElementById('comentarios').disabled = true;
				document.getElementById('observaciones').value = elemento.observaciones;
				document.getElementById('observaciones').disabled = true;
				document.getElementById('submit').disabled= true
				document.getElementById('modificar').style.display = ''
				document.getElementById('limpiar').style.display = 'none';

			}
			function modificar(){
				document.getElementById("fecha_cont").disabled = false;
				document.getElementById("fecha_aviso").disabled = false;
				document.getElementById("hora").disabled = false;
				document.getElementById("tipo_cont").disabled = false;
				document.getElementById("status").disabled = false;
				document.getElementById("acuerdos").disabled = false;
				document.getElementById("comentarios").disabled = false;
				document.getElementById("observaciones").disabled = false;
				document.getElementById("submit").disabled = false;
				document.getElementById('modificar').style.display = 'none'
				document.getElementById('limpiar').style.display = '';
			}
			function limpiar(){
				
				document.getElementById("fecha_cont").value = '';
				
				document.getElementById("fecha_aviso").value = '';
				
				document.getElementById("hora").value = '';
				
				document.getElementById("tipo_cont").value = '';
				
				document.getElementById('status').value = '';
				
				document.getElementById('acuerdos').value = '';
				
				document.getElementById('comentarios').value = '';
				
				document.getElementById('observaciones').value = '';				
			}


			function crm()
		{

			
	var id=document.getElementById('paciente_id_crm').value;
    var fecha_act=document.getElementById('fecha_act').value;
    var fecha_cont=document.getElementById('fecha_cont').value;
    var fecha_aviso=document.getElementById('fecha_aviso').value;
    var hora=document.getElementById('hora').value;
    var status=document.getElementById('status').value;
    var comentarios=document.getElementById('comentarios').value;
    var acuerdos=document.getElementById('acuerdos').value;
    var observaciones=document.getElementById('observaciones').value;
    var tipo_cont=document.getElementById('tipo_cont').value;

    alert(fecha_cont);

		  $.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });
		  $.ajax({
		    url: "/crm",
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