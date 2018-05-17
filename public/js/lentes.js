$(document).ready(function(){

$("#tipo_lente").change(function(){

      	var option=document.getElementById("tipo_lente").value;
       

       if(option == 'Monofocal'){
       	
       	document.getElementById('monofocal_div').style.display = 'block';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'none';
       	document.getElementById('monofocal_material_div').style.display = 'block';	
       	document.getElementById('monofocal_tratamiento_div').style.display = 'block';
       	document.getElementById('modulo_bifocal').style.display = 'none'; 
       	document.getElementById('modulo_progresivo').style.display = 'none'; 
       
       }else if(option  == 'Bifocal'){
       		
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'block';
       	document.getElementById('progresivo_div').style.display = 'none';
        document.getElementById('monofocal_material_div').style.display = 'none';
        document.getElementById('monofocal_tratamiento_div').style.display = 'none';
         document.getElementById('modulo_bifocal').style.display = 'block';
         document.getElementById('modulo_progresivo').style.display = 'none'; 

       }else if(option  == 'Progresivo'){
       	
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'block';
       	document.getElementById('monofocal_material_div').style.display = 'none';
       	document.getElementById('monofocal_tratamiento_div').style.display = 'none';
       	document.getElementById('modulo_bifocal').style.display = 'none'; 
       	document.getElementById('modulo_progresivo').style.display = 'block'; 

       }else{
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'none';
       	document.getElementById('monofocal_material_div').style.display = 'none';
       	document.getElementById('monofocal_tratamiento_div').style.display = 'none';
       	document.getElementById('modulo_bifocal').style.display = 'none';
       	document.getElementById('modulo_progresivo').style.display = 'none'; 
       	 
       }

    });






      $("#monofocal_material").change(function(){

      	var option=document.getElementById("monofocal_material").value;

      	if(option == 'Básico'){
       	
       	document.getElementById('monofocal_basico_div').style.display = 'block';
       	document.getElementById('monofocal_premium_div').style.display = 'none';
       	$("#monofocal_material_basico").prop('required')=true;
       	$("#monofocal_material_premium").prop('required')=false;
       
       }else if(option  == 'Premium'){

       	document.getElementById('monofocal_basico_div').style.display = 'none';
       	document.getElementById('monofocal_premium_div').style.display = 'block';
       	$("#monofocal_material_basico").prop('required')=false;
       	$("#monofocal_material_premium").prop('required')=true;

       }else{

       	document.getElementById('monofocal_basico_div').style.display = 'none';
       	document.getElementById('monofocal_premium_div').style.display = 'none';
       	$("#monofocal_material_basico").prop('required')=false;
       	$("#monofocal_material_premium").prop('required')=false;

       }

      });


    $("#armazon_radio1").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'none';
      $("#tipo_lente").prop('required')=true;
     });

     $("#armazon_radio2").change(function(){
      document.getElementById('contacto').style.display = 'block';
      document.getElementById('armazon').style.display = 'none';
      $("#tipo_lente").prop('required')=false;
      
     });

    $("#armazon_radio3").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'block';
      $("#tipo_lente").prop('required')=true;
     });


    $("#fotocromatico").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('fotocromatico_div').style.display = 'block';
       	document.getElementById('polarizado_div').style.display = 'none';
        $("#polarizado").prop( "checked", false );
       }else{
       	document.getElementById('fotocromatico_div').style.display = 'none';
       
       }
    });

     $("#antirreflejante").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('antirreflejante_div').style.display = 'block';
       	document.getElementById('polarizado_div').style.display = 'none';
       $("#polarizado").prop( "checked", false );
       }else{
       	document.getElementById('antirreflejante_div').style.display = 'none';
       
       }
    });


      $("#polarizado").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('polarizado_div').style.display = 'block';
        document.getElementById('antirreflejante_div').style.display = 'none';
        document.getElementById('fotocromatico_div').style.display = 'none';
        $("#antirreflejante").prop( "checked", false );
        $("#fotocromatico").prop( "checked", false );
       }else{
       	document.getElementById('polarizado_div').style.display = 'none';
        
       }
    });

$("#tipo_fotocromatico").change(function(){

      	var option=document.getElementById("tipo_fotocromatico").value;
       

       if(option == 'Premium'){
       	
       	document.getElementById('foto_premium_div').style.display = 'block';
       	
       
       }else{
       	
       	document.getElementById('foto_premium_div').style.display = 'none';
       		
       }
    });

$("#tipo_antirreflejante").change(function(){

      	var option=document.getElementById("tipo_antirreflejante").value;
       

       if(option == 'Premium'){
       	
       	document.getElementById('anti_premium_div').style.display = 'block';
       	
       
       }else{
       	
       	document.getElementById('anti_premium_div').style.display = 'none';
       		
       }
    });


 $("#tratamiento1").change(function(){
      document.getElementById('tratamiento_si_div').style.display = 'block';
      
     });

  $("#tratamiento2").change(function(){
      document.getElementById('tratamiento_si_div').style.display = 'none';
      
     });

	

//--------------------------------------------------------------xtrac_div
$("#airwear").change(function(){

	 if($(this).prop('checked') == true){
	 	
       	document.getElementById('trio_div').style.display = 'none';
       	document.getElementById('xtrac_div').style.display = 'block';
       $("#trio").prop( "checked", false );
       }

});

$("#orma").change(function(){

   if($(this).prop('checked') == true){
	document.getElementById('trio_div').style.display = 'block';
	document.getElementById('xtrac_div').style.display = 'none';
	$("#xtrac").prop( "checked", false );
	}
});

	//----------------------------------------------------


$("#flattop").change(function(){

   if($(this).prop("checked") == true){

   	document.getElementById('bifocal_flat_div').style.display = "block";
	document.getElementById('bifocal_flat_tratamiento_div').style.display = "block";
	document.getElementById('bifocal_blend_div').style.display = "none";
	document.getElementById('bifocal_blend_tratamiento_div').style.display = "none";
	$("#tratamiento_flat").prop('required')=true;
	$("#bifocal_flat_material").prop('required')=true;
	$("#tratamiento_blend").prop('required')=false;
	$("#bifocal_blend_material").prop('required')=false;
	    }else{
	document.getElementById('bifocal_flat_div').style.display = "none";
	document.getElementById('bifocal_flat_tratamiento_div').style.display = "none";    	
	    }
	});

$("#blend").change(function(){

   if($(this).prop("checked") == true){
	document.getElementById('bifocal_blend_div').style.display = "block";
	document.getElementById('bifocal_blend_tratamiento_div').style.display = "block";
	document.getElementById('bifocal_flat_div').style.display = "none";
	document.getElementById('bifocal_flat_tratamiento_div').style.display = "none";
	$("#tratamiento_flat").prop('required')=false;
	$("#bifocal_flat_material").prop('required')=false;
	$("#tratamiento_blend").prop('required')=true;
	$("#bifocal_blend_material").prop('required')=true;
	    }else{
	document.getElementById('bifocal_blend_div').style.display = "none";
	document.getElementById('bifocal_blend_tratamiento_div').style.display = "none";
	    }
	});
//--------------------------------------------------------------------
$("#tratamiento1_flat").change(function(){
	if($(this).prop("checked") == true){
		document.getElementById('tratamiento_flat_si').style.display = "block";
		
	}
});

$("#tratamiento2_flat").change(function(){
	if($(this).prop("checked") == true){
		document.getElementById('tratamiento_flat_si').style.display = "none";
		$("#tratamiento_flat_antirreflejante_basico").prop("checked",false);
		$("#tratamiento_flat_fotocromatico_basico").prop("checked",false);
		
		
	}
});
//------------------------------------------------------------------------
$("#tratamiento1_blend").change(function(){
	if($(this).prop("checked") == true){
		document.getElementById('tratamiento_blend_si').style.display = "block";
		
	}
});

$("#tratamiento2_blend").change(function(){
	if($(this).prop("checked") == true){
		document.getElementById('tratamiento_blend_si').style.display = "none";
		$("#tratamiento_blend_basico").prop( "checked", false );
	}
});
//---------------------------------------------------------
$("#progresivo_basico").change(function(){
   document.getElementById('progresivo_basico_div').style.display = "block";
   document.getElementById('progresivo_premium_div').style.display = "none";
});

$("#progresivo_premium").change(function(){
   document.getElementById('progresivo_basico_div').style.display = "none";
   document.getElementById('progresivo_premium_div').style.display = "block";
});
//-------------------------------------------------------------
$("#tratamiento1_progresivo_basico").change(function(){
  document.getElementById('tratamiento_progresivo_basico_si').style.display = "block";
});

$("#tratamiento2_progresivo_basico").change(function(){
 document.getElementById('tratamiento_progresivo_basico_si').style.display = "none";
 $("#tratamiento_progresivo_basico_antirreflejante").prop( "checked", false );
 $("#tratamiento_progresivo_basico_fotocromatico").prop( "checked", false );
 
});
//------------------------------------------------------------------------
$("#tratamiento_progresivo_premium1").change(function(){
	document.getElementById('tratamiento_progresivo_premium_si_div').style.display = "block";
});

$("#tratamiento_progresivo_premium2").change(function(){
	document.getElementById('tratamiento_progresivo_premium_si_div').style.display = "none";
	$("#tratamiento_progresivo_premium_antirreflejante").prop( "checked", false );
	$("#tratamiento_progresivo_premium_fotocromatico").prop( "checked", false );

});
//-----------------------------------------------------
$("#tratamiento_progresivo_premium_antirreflejante").change(function(){
	if($(this).prop("checked") == true){
document.getElementById('tratamiento_progresivo_premium_antirreflejante_div').style.display="block";
		
	}else{
document.getElementById('tratamiento_progresivo_premium_antirreflejante_div').style.display="none";		
	}
});

$("#tratamiento_progresivo_premium_fotocromatico").change(function(){
	if($(this).prop("checked") == true){
document.getElementById('tratamiento_progresivo_premium_fotocromatico_div').style.display = "block";

		
	}else{
document.getElementById('tratamiento_progresivo_premium_fotocromatico_div').style.display = "none";		
	}
		});

});