$(document).ready(function(){
	$(":text").keyup(function(){
var sucursal=$("#sucursal_id").prop('value');
var numero=$("#consecutivo").prop('value');
	$("#identificador").prop('value','GLER'+sucursal+numero);

   });

$("#sucursal_id").change(function(){
	var sucursal=$("#sucursal_id").prop('value');
var numero=$("#consecutivo").prop('value');
	$("#identificador").prop('value','GLER'+sucursal+numero);
	});
});


