$(document).ready(function($) {
	// Enable pusher logging - don't include this in production
    //Pusher.logToConsole = true;

    var pusher = new Pusher('17536cb5f3c9acc6bf03', {
      cluster: 'us2',
      forceTLS: true
    });

    var channel = pusher.subscribe('orden_trabajo');
    channel.bind('ordenCreado', function(data) {
      swal({
          title: "Nueva Orden Generada",
          text: 'Hay una nueva orden de trabajo para ' + data.orden_trabajo.fecha_entrega,
          icon: "info",
          button: "Estoy en ello",
        });
    }); 	
});