$(document).ready(function(){

$("#tipo_lente").change(function(){

      	var option=document.getElementById("tipo_lente").value;
      

       if(option == 'MONOFOCAL'){
       	
       	document.getElementById('monofocal_div').style.display = 'block';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'none';
       	document.getElementById('monofocal_material_div').style.display = 'block';	
       	document.getElementById('monofocal_tratamiento_div').style.display = 'block';
       	document.getElementById('modulo_bifocal').style.display = 'none'; 
       	document.getElementById('modulo_progresivo').style.display = 'none'; 
        $("#monofocal_ambas").prop('required',true);
        $("#monofocal_material").prop('required',true);
        $("#tratamiento1").prop('required',true);
        $("#blend").prop('required',false);
        $("#progresivo_basico").prop('required',false);
       
       }else if(option  == 'BIFOCAL'){
       		
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'block';
       	document.getElementById('progresivo_div').style.display = 'none';
        document.getElementById('monofocal_material_div').style.display = 'none';
        document.getElementById('monofocal_tratamiento_div').style.display = 'none';
        document.getElementById('modulo_bifocal').style.display = 'block';
        document.getElementById('modulo_progresivo').style.display = 'none'; 
        $("#monofocal_ambas").prop('required',false);
        $("#monofocal_material").prop('required',false);
        $("#tratamiento1").prop('required',false);
        $("#blend").prop('required',true);
        $("#progresivo_basico").prop('required',false);

       }else if(option  == 'PROGRESIVO'){
       	
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'block';
       	document.getElementById('monofocal_material_div').style.display = 'none';
       	document.getElementById('monofocal_tratamiento_div').style.display = 'none';
       	document.getElementById('modulo_bifocal').style.display = 'none'; 
       	document.getElementById('modulo_progresivo').style.display = 'block';
        $("#monofocal_ambas").prop('required',false); 
        $("#monofocal_material").prop('required',false);
        $("#tratamiento1").prop('required',false);
        $("#blend").prop('required',false);
        $("#progresivo_basico").prop('required',true);

       }else{
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'none';
       	document.getElementById('monofocal_material_div').style.display = 'none';
       	document.getElementById('monofocal_tratamiento_div').style.display = 'none';
       	document.getElementById('modulo_bifocal').style.display = 'none';
       	document.getElementById('modulo_progresivo').style.display = 'none'; 
        $("#monofocal_ambas").prop('required',false);
        $("#monofocal_material").prop('required',false);
        $("#tratamiento1").prop('required',false);
        $("#blend").prop('required',false);
        $("#progresivo_basico").prop('required',false);
       	 
       }

    });






      $("#monofocal_material").change(function(){

      	var option=document.getElementById("monofocal_material").value;

      	if(option == 'BÁSICO'){
       	
       	document.getElementById('monofocal_basico_div').style.display = 'block';
       	document.getElementById('monofocal_premium_div').style.display = 'none';
        document.getElementById('anti_basico_div').style.display = 'block';
        document.getElementById('anti_premium_div').style.display = 'none';
        document.getElementById('foto_premium_div').style.display = 'none';
        document.getElementById('foto_basico_div').style.display = 'block';
        document.getElementById('polarizado_premium_div').style.display = 'none';
        document.getElementById('polarizado_basico_div').style.display = 'block';

        $("#mono_bas").prop('required',true);
       	$("#orma").prop('required',false);
       	$("#anti_basico").prop('value','BÁSICO');
        $("#foto_basico").prop('value','BÁSICO');
        $("#polarizado_basico").prop('value','BÁSICO');
        
        

        
       
       }else if(option  == 'PREMIUM'){

       	document.getElementById('monofocal_basico_div').style.display = 'none';
       	document.getElementById('monofocal_premium_div').style.display = 'block';
        document.getElementById('anti_basico_div').style.display = 'none';
        document.getElementById('anti_premium_div').style.display = 'block';
        document.getElementById('foto_premium_div').style.display = 'block';
        document.getElementById('foto_basico_div').style.display = 'none';
        document.getElementById('polarizado_premium_div').style.display = 'block';
        document.getElementById('polarizado_basico_div').style.display = 'none';

       	$("#mono_bas").prop('required',false);
        $("#orma").prop('required',true);
        $("#anti_basico").prop('value',''); 
        $("#foto_basico").prop('value','');
        $("#polarizado_basico").prop('value','');

       }else{

       	document.getElementById('monofocal_basico_div').style.display = 'none';
       	document.getElementById('monofocal_premium_div').style.display = 'none';
        document.getElementById('anti_basico_div').style.display = 'none';
        document.getElementById('anti_premium_div').style.display = 'none';
        document.getElementById('foto_basico_div').style.display = 'none';
        document.getElementById('foto_premium_div').style.display = 'none';
        document.getElementById('polarizado_premium_div').style.display = 'none';
        document.getElementById('polarizado_basico_div').style.display = 'none';

       	$("#mono_bas").prop('required',false);
        $("#orma").prop('required',false);
        $("#anti_basico").prop('value','');
        $("#foto_basico").prop('value','');
        $("#polarizado_basico").prop('value','');

       }

      });


    $("#armazon_radio1").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'none';
      $("#tipo_lente").prop('required',true);
     });

     $("#armazon_radio2").change(function(){
      document.getElementById('contacto').style.display = 'block';
      document.getElementById('armazon').style.display = 'none';
      $("#tipo_lente").prop('required',false);
      
     });

    $("#armazon_radio3").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'block';
      $("#tipo_lente").prop('required',true);
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
	
  $("#tratamiento1_flat").prop('required',true);
  $("#cr39").prop('required',true);
  $("#tratamiento1_blend").prop('required',false);
  $("#bifocal_blend_material").prop("checked",false);
  $("#tratamiento1_blend").prop("checked",false);
  $("#tratamiento2_blend").prop("checked",false);
  $("#tratamiento_blend_basico").prop("checked",false);
	
	    }else{
	document.getElementById('bifocal_flat_div').style.display = "none";
	document.getElementById('bifocal_flat_tratamiento_div').style.display = "none"; 
  $("#tratamiento1_flat").prop('required',false);
  $("#cr39").prop('required',false);   	
	    }
	});

$("#blend").change(function(){

   if($(this).prop("checked") == true){
	document.getElementById('bifocal_blend_div').style.display = "block";
	document.getElementById('bifocal_blend_tratamiento_div').style.display = "block";
	document.getElementById('bifocal_flat_div').style.display = "none";
	document.getElementById('bifocal_flat_tratamiento_div').style.display = "none";
	$("#tratamiento1_flat").prop('required',false);
  $("#cr39").prop('required',false); 
  $("#tratamiento1_blend").prop('required',true);
  $("#cr39").prop("checked",false);
  $("#policarbonato").prop("checked",false);
  $("#tratamiento1_flat").prop("checked",false);
  $("#tratamiento2_flat").prop("checked",false);
  $("#tratamiento_flat_antirreflejante_basico").prop("checked",false);
  $("#tratamiento_flat_fotocromatico_basico").prop("checked",false);
	    }else{
	document.getElementById('bifocal_blend_div').style.display = "none";
	document.getElementById('bifocal_blend_tratamiento_div').style.display = "none";
  $("#tratamiento1_blend").prop('required',false);
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
   $("#prog_cr").prop('required',true);
   $("#tratamiento2_progresivo_basico").prop('required',true);
   
   $("#precise").prop('required',false);
   $("#air").prop('required',false);
   $("#tratamiento_progresivo_premium2").prop('required',false);
   $("#unique").prop("checked",false);
   $("#easy").prop("checked",false);
   $("#precise").prop("checked",false);
   $("#prog_orma").prop("checked",false);
   $("#air").prop("checked",false);
   $("#tratamiento_progresivo_premium1").prop("checked",false);
   $("#tratamiento_progresivo_premium2").prop("checked",false);
   $("#tratamiento_progresivo_premium_antirreflejante").prop("checked",false);
   $("#tratamiento_progresivo_premium_fotocromatico").prop("checked",false);
   $("#c_easy").prop("checked",false);
   $("#c_alize").prop("checked",false);
   $("#c_forte").prop("checked",false);
   $("#c_prev").prop("checked",false);
   $("#f_tran").prop("checked",false);
   $("#f_caf").prop("checked",false);
   $("#f_ver").prop("checked",false);
   document.getElementById('tratamiento_progresivo_premium_antirreflejante_div').style.display="none";
   document.getElementById('tratamiento_progresivo_premium_fotocromatico_div').style.display = "none";  
});

$("#progresivo_premium").change(function(){
   document.getElementById('progresivo_basico_div').style.display = "none";
   document.getElementById('progresivo_premium_div').style.display = "block";
   $("#prog_cr").prop('required',false);
   $("#tratamiento2_progresivo_basico").prop('required',false);
   
   $("#precise").prop('required',true);
   $("#air").prop('required',true);
   $("#tratamiento_progresivo_premium2").prop('required',true);
   $("#prog_cr").prop("checked",false);
   $("#prog_poli").prop("checked",false);
   $("#tratamiento1_progresivo_basico").prop("checked",false);
   $("#tratamiento2_progresivo_basico").prop("checked",false);
   $("#tratamiento_progresivo_basico_antirreflejante").prop("checked",false);
   $("#tratamiento_progresivo_basico_fotocromatico").prop("checked",false);
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
//---------------------------------------------------------


//*************************************************************
});