var flag1 = flag2 = flag3 = flag4 = flag5 = end = false;
var req1 = req2 = req3 = req4 = req5 = req6 = req7 = req8 = req9 = req10 = requ11 = req12 = false;

function cargar() {

  if(flag1) { // TIPO ANTEOJO
    $("#tipo_lentilla").prop('value', '');
    document.getElementById('categoria').style.display = 'none';
    flag1 = false;
  }
  if(flag2) { // TIPO DE LENTE
    $("#tipo_categoria").prop('value', '');
    document.getElementById('cosmetico').style.display = 'none';
    document.getElementById('esferico').style.display = 'none';
    document.getElementById('torico').style.display = 'none';
    document.getElementById('multifocal').style.display = 'none';
    flag2 = false;
    req1 = req2 = req3 = req4 = false;
  }
  if(flag3) { // CATEGORÍA
  	// COSMÉTICO
  	$("#cosmetico_radio1").prop('checked', false);
  	$("#cosmetico_radio2").prop('checked', false);
  	$("#cosmetico_radio3").prop('checked', false);
  	if(!req1)
  		$("#cosmetico_radio1").prop('required', false);
    // ESFÉRICO
    $("#tipo_esferico").prop('value', '');
    document.getElementById('desechable').style.display = 'none';
    document.getElementById('anual').style.display = 'none';
    if(!req2)
    $("#tipo_esferico").prop('required', false);
    	// TÓRICO
    	$("#tipo_torico").prop('value', '');
    document.getElementById('importado').style.display = 'none';
    if(!req3)
    $("#tipo_torico").prop('required', false);
    	// MULTIFOCAL
    $("#multifocal_radio1").prop('checked', false);
    $("#multifocal_radio2").prop('checked', false);
    document.getElementById('diario_multifocal').style.display = 'none';
    document.getElementById('mensual_multifocal').style.display = 'none';
    if(!req4)
    $("#multifocal_radio1").prop('required', false);
    flag3 = false;
    req5 = req6 = req11 = req12 =false;
  }
  if(flag4) {
    // ESFÉRICO
    $("#desechable_radio1").prop('checked', false);
    $("#desechable_radio2").prop('checked', false);
    $("#anual_radio").prop('checked', false);
    document.getElementById('diario').style.display = 'none';
    document.getElementById('mensual').style.display = 'none';
    if(!req5)
    $("#desechable_radio1").prop('required', false);
    	// TÓRICO
    	$("#importado_radio1").prop('checked', false);
    	$("#importado_radio2").prop('checked', false);
    document.getElementById('diario_torico').style.display = 'none';
    document.getElementById('mensual_torico').style.display = 'none';
    if(!req6)
      $("#importado_radio1").prop('required', false);
    	// MULTIFOCAL
    $("#diario_multifocal_radio1").prop('checked', false);
    if(!req11)
    $("#diario_multifocal_radio1").prop('required', false);
    $("#mensual_multifocal_radio1").prop('checked', false);
    $("#mensual_multifocal_radio2").prop('checked', false);
    if(!req12)
    $("#mensual_multifocal_radio1").prop('required', false);
    flag4 = false;
    req7 = req8 = req9 = req10 = false;
  }
  if(flag5) {
    // ESFÉRICO
    $("#diario_radio1").prop('checked', false);
    $("#diario_radio2").prop('checked', false);
    if(!req7)
    $("#diario_radio1").prop('required', false);
    $("#mensual_radio1").prop('checked', false);
    $("#mensual_radio2").prop('checked', false);
    $("#mensual_radio3").prop('checked', false);
    $("#mensual_radio4").prop('checked', false);
    $("#mensual_radio5").prop('checked', false);
    $("#mensual_radio6").prop('checked', false);
    $("#mensual_radio7").prop('checked', false);
    $("#mensual_radio8").prop('checked', false);
    if(!req8)
    $("#mensual_radio1").prop('required', false);
    	// TÓRICO
    	$("#diario_torico_radio1").prop('checked', false);
    	$("#diario_torico_radio2").prop('checked', false);
    	if(!req9)
     $("#diario_torico_radio1").prop('required', false);
    $("#mensual_torico_radio1").prop('checked', false);
    $("#mensual_torico_radio2").prop('checked', false);
    $("#mensual_torico_radio3").prop('checked', false);
    $("#mensual_torico_radio4").prop('checked', false);
    if(!req10)
     $("#mensual_torico_radio1").prop('required', false);
    flag5 = false;
  }
  if(end) {
    // document.getElementById('finish').style.display = 'none';
    // end = false;
  }

  // TIPO DE ANTEOJOS
  $('[name="tipo_anteojo"]').change(function() {
    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    end = true;
  });
  $('#anteojo_radio1').change(function() {
    document.getElementById('armazon').style.display = 'block';
    document.getElementById('contacto').style.display = 'none';
    $("#tipo_lentilla").prop('checked', false);
    $("#tipo_categoria").prop('checked', false);
  });
  $('#anteojo_radio2').change(function() {
    document.getElementById('armazon').style.display = 'none';
    document.getElementById('contacto').style.display = 'block';
    $("#tipo_lentilla").prop('checked', true);
    $("#tipo_categoria").prop('checked', true);
  });

  // TIPO DE LENTES DE CONTACTO
  $("#tipo_lentilla").change(function() {
    var tipo = document.getElementById("tipo_lentilla").value;
    if(tipo != "")
      document.getElementById('categoria').style.display = 'block';
    else
      document.getElementById('categoria').style.display = 'none';
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    end = true;
  });

  // TIPO DE CATEGORÍA
  $("#tipo_categoria").change(function() {
    end = true;
    req1 = req2 = req3 = req4 = false;
    var tipo = document.getElementById("tipo_categoria").value;
    if(tipo == "COSMÉTICO") {
      document.getElementById('cosmetico').style.display = 'block';
      document.getElementById('esferico').style.display = 'none';
      document.getElementById('torico').style.display = 'none';
      document.getElementById('multifocal').style.display = 'none';
      $("#cosmetico_radio1").prop('required', true);
      req1 = true;
    } else if(tipo == "ESFÉRICO") {
      document.getElementById('cosmetico').style.display = 'none';
      document.getElementById('esferico').style.display = 'block';
      document.getElementById('torico').style.display = 'none';
      document.getElementById('multifocal').style.display = 'none';
      $("#tipo_esferico").prop('required', true);
      req2 = true;
    } else if(tipo == "TÓRICO") {
      document.getElementById('cosmetico').style.display = 'none';
      document.getElementById('esferico').style.display = 'none';
      document.getElementById('torico').style.display = 'block';
      document.getElementById('multifocal').style.display = 'none';
      $("#tipo_torico").prop('required', true);
      req3 = true;
    } else if(tipo == "MULTIFOCALES") {
      document.getElementById('cosmetico').style.display = 'none';
      document.getElementById('esferico').style.display = 'none';
      document.getElementById('torico').style.display = 'none';
      document.getElementById('multifocal').style.display = 'block';
      $("#multifocal_radio1").prop('required', true);
      req4 = true;
    } else if(tipo == "PUPILA NEGRA") {
      document.getElementById('cosmetico').style.display = 'none';
      document.getElementById('esferico').style.display = 'none';
      document.getElementById('torico').style.display = 'none';
      document.getElementById('multifocal').style.display = 'none';
      document.getElementById('finish').style.display = 'block';
      end = false;
    } else {
      document.getElementById('cosmetico').style.display = 'none';
      document.getElementById('esferico').style.display = 'none';
      document.getElementById('torico').style.display = 'none';
      document.getElementById('multifocal').style.display = 'none';
    }
    flag3 = true;
    flag4 = true;
    flag5 = true;
  });

  // TIPO DE ESFÉRICO
  $("#tipo_esferico").change(function() {
    end = true;
    req5 = false;
    var tipo = document.getElementById("tipo_esferico").value;
    if(tipo == "DESECHABLES") {
      document.getElementById('desechable').style.display = 'block';
      document.getElementById('anual').style.display = 'none';
      $("#desechable_radio1").prop('required', true);
      req5 = true;
    } else if(tipo == "ANUALES") {
      document.getElementById('desechable').style.display = 'none';
      document.getElementById('anual').style.display = 'block';
      document.getElementById('finish').style.display = 'block';
      end = false;
    } else {
      document.getElementById('desechable').style.display = 'none';
      document.getElementById('anual').style.display = 'none';
    }
    flag4 = true;
    flag5 = true;
  });

  // TIPO DE DESECHABLE
  $('[name="tipo_desechable"]').change(function() {
    flag5 = true;
    end = true;
    req7 = req8 = false;
  });
  $('#desechable_radio1').change(function() {
    document.getElementById('diario').style.display = 'block';
    document.getElementById('mensual').style.display = 'none';
    $("#diario_radio1").prop('required', true);
    req7 = true;
  });
  $('#desechable_radio2').change(function() {
    document.getElementById('diario').style.display = 'none';
    document.getElementById('mensual').style.display = 'block';
    $("#mensual_radio1").prop('required', true);
    req8 = true;
  });

  // TIPO DE TÓRICO
  $("#tipo_torico").change(function() {
    end = true;
    req6 = false;
    var tipo = document.getElementById("tipo_torico").value;
    if(tipo == "IMPORTADO") {
      document.getElementById('importado').style.display = 'block';
      $("#importado_radio1").prop('required', true);
      req6 = true;
    } else if(tipo == "NACIONAL") {
      document.getElementById('finish').style.display = 'block';
      document.getElementById('importado').style.display = 'none';
      end = false;
    } else
      document.getElementById('importado').style.display = 'none';
    flag4 = true;
    flag5 = true;
  });

  // TIPO DE IMPORTADO
  $('[name="tipo_importado"]').change(function() {
    flag5 = true;
    end = true;
    req9 = req10 = false;
  });
  $('#importado_radio1').change(function() {
    document.getElementById('diario_torico').style.display = 'block';
    document.getElementById('mensual_torico').style.display = 'none';
    $("#diario_torico_radio1").prop('required', true);
    req9 = true;
  });
  $('#importado_radio2').change(function() {
    document.getElementById('diario_torico').style.display = 'none';
    document.getElementById('mensual_torico').style.display = 'block';
    $("#mensual_torico_radio1").prop('required', true);
    req10 = true;
  });

  // MULTIFOCAL
  $('[name="tipo_multifocal"]').change(function() {
    flag4 = true;
    end = true;
    req11 = req12 = false;
  });
  $('#multifocal_radio1').change(function() {
    document.getElementById('diario_multifocal').style.display = 'block';
    document.getElementById('mensual_multifocal').style.display = 'none';
    $("#diario_multifocal_radio1").prop('required', true);
    req11 = true;
  });
  $('#multifocal_radio2').change(function() {
    document.getElementById('diario_multifocal').style.display = 'none';
    document.getElementById('mensual_multifocal').style.display = 'block';
    $("#mensual_multifocal_radio1").prop('required', true);
    req12 = true;
  });

  // FINAL
  $('[name="tipo_cosmetico"]').change(function() {
    document.getElementById('finish').style.display = 'block';
  });

  $('[name="diario"]').change(function() {
    document.getElementById('finish').style.display = 'block';
  });
  $('[name="mensual"]').change(function() {
    document.getElementById('finish').style.display = 'block';
  });
  $('[name="diario_torico"]').change(function() {
    document.getElementById('finish').style.display = 'block';
  });
  $('[name="mensual_torico"]').change(function() {
    document.getElementById('finish').style.display = 'block';
  });
  $('[name="diario_multifocal"]').change(function() {
    document.getElementById('finish').style.display = 'block';
  });
  $('[name="mensual_multifocal"]').change(function() {
    document.getElementById('finish').style.display = 'block';
  });

}

$(document).ready(function() {
  cargar();
  $(document).change(function() {
    cargar();
  });
});