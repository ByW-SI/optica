$(document).ready(function(){
	
	$("#cirugias").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('cirug').style.display = 'block';
       $("#cirug_1").prop('required',true);
       $("#cirug_2").prop('required',true);
       $("#cirug_3").prop('required',true);
       }else{
       	document.getElementById('cirug').style.display = 'none';
       $("#cirug_1").prop('required',false);
       $("#cirug_2").prop('required',false);
       $("#cirug_3").prop('required',false);
       }
    });

         $("#padecimientos").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('padec').style.display = 'block';
       
       }else{
       	document.getElementById('padec').style.display = 'none';
       
       }
    });


        $("#padec_otra").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('padec_text').style.display = 'block';
        $("#padec_textc").prop('required',true);
       }else{
       	document.getElementById('padec_text').style.display = 'none';
        $("#padec_textc").prop('required',false);
       }
    });

    $("#ante_otra").change(function(){

      if($(this).prop('checked') == true){
       	document.getElementById('ante_text').style.display = 'block';
       $("#antecedente_text").prop('required',true);
       }else{
       	document.getElementById('ante_text').style.display = 'none';
       $("#antecedente_text").prop('required',false);
       }
    });

          $("input[name=usuario_lentes]").change(function(){

if($("#usuario_lentes1").prop('checked')==true){


	$("#edad_lentes").show();
	$("#edad_lentes_select").prop('required',true);

}
else if($("#usuario_lentes3").prop('checked')==true){
	$("#edad_lentes").show();
	$("#edad_lentes_select").prop('required',true);
}
else{
	$("#edad_lentes").hide();
	$("#edad_lentes_select").prop('required',false);
}

});




	



$("#cil_od").change(function(){
	
	var option=document.getElementById("cil_od").value;
	if(option!='Sin Valor'){
		document.getElementById('eje_od_div').style.display = 'block';
		$("#eje_od").prop('required',true);
	}else{
		document.getElementById('eje_od_div').style.display = 'none';
		$("#eje_od").prop('required',false);
	}

      });

$("#cil_oi").change(function(){
	
	var option=document.getElementById("cil_oi").value;
	if(option!='Sin Valor'){
		document.getElementById('eje_oi_div').style.display = 'block';
		$("#eje_oi").prop('required',true);
	}else{
		document.getElementById('eje_oi_div').style.display = 'none';
		$("#eje_oi").prop('required',false);
	}

      });




});