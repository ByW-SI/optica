function formulario(elemento) {
  	if (elemento.value == "Prospecto") {
	  document.getElementById('cliente').style.display = 'none';
	  document.getElementById('cliente1').style.display = 'none';
	  document.getElementById('cliente2').style.display = 'none';
  	} else if (elemento.value == "Cliente") {
	  document.getElementById('cliente').style.display = 'inline';
	  document.getElementById('cliente1').style.display = 'inline';
	  document.getElementById('cliente2').style.display = 'inline';
  	}
}

function persona(elemento) {
	if(elemento.value == "Fisica") {
		document.getElementById('perfisica').style.display = 'block';
		document.getElementById('permoral').style.display = 'none';
		document.getElementById('varrfc').pattern = "^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}";
		document.getElementById('varrfc').placeholder = "Ingrese 13 caracteres";
		document.getElementById('varrfc').title = "Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres";
		$("#apellidopaterno").prop('required', true);
		$("#nombre").prop('required', true);
		$("#razonsocial").prop('required', false);
	} else if(elemento.value == "Moral") {
		document.getElementById('perfisica').style.display = 'none';
		document.getElementById('permoral').style.display = 'block';
		document.getElementById('varrfc').pattern = "^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
		document.getElementById('varrfc').placeholder = "Ingrese 12 caracteres";
		document.getElementById('varrfc').title = "Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
		$("#apellidopaterno").prop('required', false);
		$("#nombre").prop('required', false);
		$("#razonsocial").prop('required', true);
	}
}
// $('div#tab').remove();
$("tr").click(function(){
  $('div.persona').hide();
  // console.log(this.getAttribute('href'));
  var index = $(this.getAttribute('href'));
  $(index).removeClass("pestana");
  // $('#tab').dialog('open');
  $(this.getAttribute('href')).show();

});
$(function() {
  $("li").click(function() {
  // remove classes from all
  $("li").removeClass("active");
  // add class to the one we clicked
  $(this).addClass("active");
 });
});
  
$('li a').click(function(){
  $(this.getAttribute('class')).addClass("active");
  $('.pestana').hide();
  $(this.getAttribute('href')).show();
});

$(function() {
  	tipopersona = $('#tipopersona').val();
  	if(tipopersona == 'Moral') {
		document.getElementById('perfisica').style.display = 'none';
		document.getElementById('permoral').style.display = 'block';
		document.getElementById('rfc').pattern = '^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}';
		document.getElementById('rfc').placeholder = 'Ingrese 12 caracteres';
		document.getElementById('rfc').title = 'Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres';
		$('#apellidopaterno').prop('required', false);
		$('#nombre').prop('required', false);
		$('#razonsocial').prop('required', true);
  	}
});

// $(function(){
//               $('.dropdown-submenu a.test').on("click", function(e){
//                 $(this).next('ul').toggle();
//                 e.stopPropagation();
//                 e.preventDefault();
//               });
//             });

// $(function() {
//    $("div.panel div ul li").click(function() {
//       // remove classes from all
//       $("li").removeClass("active");
//       // add class to the one we clicked
//       $(this).addClass("active");
//    });
// });
function deleteFunction(etiqueta) {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
swal({
  title: "¿Estas seguro?",
  text: "Si eliminas, no podras recuperar tu información.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "SI",
  cancelButtonText: "¡NO!",
  closeOnConfirm: false,
  closeOnCancel: false
},function(isConfirm){
  if (!isConfirm) {
	
	swal("Cancelado", "", "error");
  } else {
	
	document.getElementById(etiqueta).submit();          // submitting the form when user press yes
  }
});
}
$('li a').click(function(){
	$(this.getAttribute('class')).addClass("active");
	$(this.getAttribute('href')).show();
});
