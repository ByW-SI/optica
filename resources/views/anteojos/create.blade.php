@extends('layouts.test')
@section('content1')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      <script src="{{ asset('js/lentes.js') }}"></script>
<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4><strong>Datos del Paciente:</strong></h4>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-info" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-primary" href="{{ route('pacientes.edit',['id'=>$paciente->id]) }}"><strong>Editar Paciente</strong></a>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-primary" href="{{ route('pacientes.index') }}"><strong>Ver Pacientes</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="identificador">ID de Paciente:</label>
						<dd><strong>{{$paciente->identificador}}</strong></dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{$paciente->appaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{$paciente->apmaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{$paciente->nombre}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{$paciente->edad}}</dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{$paciente->fecha_nacimiento}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{$paciente->sexo}}</dd>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	{{-- PESTAÑAS --}}
		<ul class="nav nav-pills nav-justified">
			<li role="presentation"><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"  class="ui-tabs-anchor">Generales:</a></li> 
			

			<li role="presentation" ><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Médico:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Ocular:</a></li>

			<li role="presentation" class="active"><a href="" class="ui-tabs-anchor">Anteojos:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Ortopédico:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Citas:</a></li>

			{{-- <li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">C.R.M:</a></li> --}}
		</ul>
	
{{-- PESTAÑAS --}}

<form role="form" 
method="POST" action="{{route('pacientes.anteojos.store',['paciente'=>$paciente]) }}">
				{{ csrf_field() }}
{{-- ANTEOJOS --}}
<div class="form-group col-xs-12" align="center" style="border: solid; border-color: grey; margin-top:20px;margin-right:45px;padding: 20px;">
	 <div  align="left">
	<strong><h4>Tipo de Anteojo</h4></strong>	
	</div><br><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Armazón</label>
			<input type="radio" name="tipo_anteojo" value="ARMAZÓN" class="option-input radio" 
			id="armazon_radio1">
		</div>
		<div class="col-sm-3">
			<label class="control-label">Lentes de Contacto</label>
			<input type="radio" name="tipo_anteojo" value="LENTES DE CONTACTO" class="option-input radio"
			id="armazon_radio2">
		</div>
		<div class="col-sm-3">
			<label class="control-label">Ambos</label>
			<input type="radio" name="tipo_anteojo" value="AMBOS" class="option-input radio"
			id="armazon_radio3">
		</div>
	</div><br><br>

	<div class="jumbotron col-xs-12" id="armazon" style="display: none;">
	 <div class="row" style="margin: 20px;">
	 	<div class="col-sm-3">
      		<label class="control-label">Tipo de Lente</label>
            <select class="form-control" name="tipo_lente" id="tipo_lente">
            	<option value="">Seleccione uno</option>
				<option value="Monofocal">Monofocal</option>
				<option value="Bifocal">Bifocal</option>
				<option value="Progresivo">Progresivo</option>
			</select>
      	</div>
      	<div class="col-sm-8" id="monofocal_div" style="display:none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">LEJOS</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="LEJOS">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CERCA</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="CERCA">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">AMBAS</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="AMBAS">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">SUB-CORRECCIÓN</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="SUB-CORRECCIÓN">
			</div>
      	</div>
      	<div class="col-sm-8" id="bifocal_div" style="display: none;">
      		<div class="col-sm-4">
      			<span class="badge badge-secondary">FLAT-TOP</span>
				<input type="radio" class="option-input radio"  name="bifocal" value="FLAT-TOP" 
				id="flattop">
			</div>
			<div class="col-sm-4">
				<span class="badge badge-secondary">BLEND</span>
				<input type="radio" class="option-input radio"  name="bifocal" value="BLEND" 
				id="blend">
			</div>
		</div>
		<div class="col-sm-8" id="progresivo_div" style="display: none;">
      		<div class="col-sm-4">
      			<span class="badge badge-secondary">BÁSICO</span>
				<input type="radio" class="option-input radio"  name="progresivo" value="BÁSICO"
				id="progresivo_basico">
			</div>
			<div class="col-sm-4 col-sm-offset-1">
				<span class="badge badge-secondary">PREMIUM</span>
				<input type="radio" class="option-input radio"  name="progresivo" value="PREMIUM"
				id="progresivo_premium">
			</div>
		</div>
	 </div><br><br>
	 <div class="row" id="monofocal_material_div" style="display: none;margin: 10px;">
	 	<div class="col-sm-3">
      		<label class="control-label">Material</label>
            <select class="form-control" name="monofocal_material" id="monofocal_material">
            	<option value="">Seleccione uno</option>
				<option value="Básico">Básico</option>
				<option value="Premium">Premium</option>
			</select>
      	</div>
      	<div class="col-sm-8" id="monofocal_basico_div" style="display: none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">CR-39 W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CR-39 W">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">HIGH-INDEX W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="HIGH-INDEX W">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">POLICARBONATO</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="POLICARBONATO">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRISTAL W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CRISTAL W">
			</div>
      	</div>
      	<div class="col-sm-8" id="monofocal_premium_div" style="display: none;margin: 30px;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">ORMA</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="ORMA" id="orma">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">AIRWEAR</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="AIRWEAR" id="airwear">
			</div>
		</div>
	 </div>
	<div class="row" id="monofocal_tratamiento_div" style="display: none;margin: 30px;">
	 	<div class="col-sm-3"><br>
      		<label class="control-label">Tratamiento</label>
        </div>
        	<div class="col-sm-8">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento1" value="SI">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento2" value="NO">
			</div>
	      	</div>

<div class=" row col-xs-12" id="tratamiento_si_div" style="border: solid; border-color: grey;background-color: white; padding: 10px; display: none;margin: 30px; ">
	    <div class="row">
            <div class="col-sm-4">
            	<input type="hidden" name="antirreflejante" value="NO">
                <input type="checkbox" class="squaredTwo" name="antirreflejante" id="antirreflejante" data-on="SI" data-off="NO" value="SI">
                <label class="col-xs-6 label-text">Antirreflejante</label>
            </div>
            <div class="col-sm-4">
            	<input type="hidden" name="fotocromatico" value="NO">
                <input type="checkbox" class="squaredTwo" name="fotocromatico" id="fotocromatico" data-on="SI" data-off="NO" value="SI">
                <label class="col-xs-6 label-text">Fotocromático</label>
            </div>
            <div class="col-sm-4">
            	<input type="hidden" name="polarizado" value="NO">
                <input type="checkbox" class="squaredTwo" name="polarizado" id="polarizado" data-on="SI" data-off="NO" value="SI">
                <label class="col-xs-6 label-text">Polarizado</label>
            </div>
        </div><br><br>
        <div class="row" id="antirreflejante_div" style="display: none;margin-bottom: 20px;">
        	<div class="col-sm-2"><label class="control-label">Tipo de Antirreflejante</label></div>
        	
        	<div class="col-sm-2" id="anti_basico_div" style="display: none;">
        	 <dd>Básico</dd>
             <input type="hidden" name="anti_basico" value="Básico">
			</div>
			<div class="col-sm-10" id="anti_premium_div" style="display: none;">
				<div class="col-sm-2" id="trio_div">
      			<span class="badge badge-secondary">TRIO</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="TRIO" id="trio">
			</div>
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">CRIZAL EASY</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL EASY">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRIZAL ALIZE</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL ALIZE">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRIZAL FORTE</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL FORTE">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRIZAL PREVENCIA</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL PREVENCIA">
			</div>
      	</div>
	    </div>
	    <div class="row" id="fotocromatico_div" style="display: none;margin-top: 10px;margin-bottom: 30px;">
        	<div class="col-sm-2">
        	 <label class="control-label">Tipo de Fotocromático</label>
            </div>
            <div class="col-sm-2" id="foto_basico_div" style="display: none;">
        	 <dd>Básico</dd>
             <input type="hidden" name="foto_basico" value="Básico">
			</div>
			<div  id="foto_premium_div" style="display: none;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">TRANSITIONS GRIS</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS GRIS">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">TRANSITIONS CAFÉ</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS CAFÉ">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">TRANSITIONS VERDE</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS VERDE">
			</div>
			<div class="col-sm-2" id="xtrac_div">
				<span class="badge badge-secondary">TRANSITIONS XTRACTIVE</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS XTRACTIVE" id="xtrac">
			</div>
      	    </div>
	    </div>
	    <div class="row" id="polarizado_div" style="display: none;">
        	<div class="col-sm-2">
        	 <label class="control-label">Tipo de Polarizado</label>
            </div>
			<div class="col-sm-3" id="polarizado_basico_div" style="display: none;">
				<dd>Básico</dd>
				<input type="hidden" name="polarizado_basico" value="Básico">
			</div>
			<div class="col-sm-3" id="polarizado_premium_div" style="display: none;">
				<dd>Premium (Xperio)</dd>
				<input type="hidden" name="polarizado_premium" value="Básico">
			</div>
		</div>
	</div>

	 </div>

<div class="container" id="modulo_bifocal">
	<div class="row" id="bifocal_flat_div" style="display: none;padding-bottom: 30px;">
	 	<div class="col-sm-3">
      		<label class="control-label">Material</label>
         </div>
          <div class="col-sm-3">
				<span class="badge badge-secondary">CR-39 W</span>
				<input type="radio" class="option-input radio"  name="bifocal_flat_material" value="CR-39 W">
			</div>
			<div class="col-sm-3" id="xtrac_div">
				<span class="badge badge-secondary">POLICARBONATO</span>
				<input type="radio" class="option-input radio"  name="bifocal_flat_material" value="POLICARBONATO" >
			</div>
     </div>

	 <div class="row" id="bifocal_flat_tratamiento_div" style="display:none;padding-bottom: 30px;">
	 	<div class="col-sm-3">
      		<label class="control-label">Tratamiento</label>
        </div>
        	<div class="row" style="padding-bottom: 30px;">
	      		<div class="col-sm-3">
	      			<span class="badge badge-secondary">SI</span>
					<input type="radio" class="option-input radio"  name="tratamiento_flat" id="tratamiento1_flat" value="SI">
				</div>
				<div class="col-sm-3">
					<span class="badge badge-secondary">NO</span>
					<input type="radio" class="option-input radio"  name="tratamiento_flat" id="tratamiento2_flat" value="NO">
				</div>
	      	</div>
	      	<div class="row" id="tratamiento_flat_si" style="background-color: white; padding-bottom: 30px; display: none;">
	      		<div class="col-sm-offset-2 col-sm-4">
	      			<span class="badge badge-secondary">ANTIRREFLEJANTE-BÁSICO</span><br>
					<input type="hidden" name="tratamiento_flat_antirreflejante_basico" value="NO">
                <input type="checkbox" class="squaredTwo" name="tratamiento_flat_antirreflejante_basico" id="tratamiento_flat_antirreflejante_basico" data-on="SI" data-off="NO" value="SI">
				</div>
				<div class=" col-sm-4">
	      			<span class="badge badge-secondary">FOTOCROMÁTICO-BÁSICO</span><br>
					<input type="hidden" name="tratamiento_flat_fotocromatico_basico" value="NO">
                <input type="checkbox" class="squaredTwo" name="tratamiento_flat_fotocromatico_basico" id="tratamiento_flat_fotocromatico_basico" data-on="SI" data-off="NO" value="SI">
				</div>
			</div>
	 </div>

	 <div class="row" id="bifocal_blend_div" style="display: none;margin-bottom: 30px;">
	 	<div class="col-sm-3">
      		<label class="control-label">Material</label>
        </div>
      	<div class="col-sm-3">
      		<span class="badge badge-secondary">CR-39 W</span><br>
      		<input type="hidden" name="bifocal_blend_material" value="NO">
                <input type="checkbox" class="squaredTwo" name="bifocal_blend_material" id="bifocal_blend_material" data-on="SI" data-off="NO" value="SI">
      	</div>
      </div>
	 <div class="row" id="bifocal_blend_tratamiento_div" style="display:none;padding-bottom: 30px;">
	 	<div class="col-sm-3">
      		<label class="control-label">Tratamiento</label>
        </div>
        	<div class="row">
	      		<div class="col-sm-3">
	      			<span class="badge badge-secondary">SI</span>
					<input type="radio" class="option-input radio"  name="tratamiento_blend" id="tratamiento1_blend" value="SI">
				</div>
				<div class="col-sm-3">
					<span class="badge badge-secondary">NO</span>
					<input type="radio" class="option-input radio"  name="tratamiento_blend" id="tratamiento2_blend" value="NO">
				</div>
	      	</div>
	      	<div class="row" id="tratamiento_blend_si" style="background-color: white; padding: 30px; display: none; margin-top: 30px;">
	      		<div class="col-sm-offset-3 col-sm-3">
	      			<span class="badge badge-secondary">ANTIRREFLEJANTE-BÁSICO</span><br>
					<input type="hidden" name="tratamiento_blend_basico" value="NO">
                <input type="checkbox" class="squaredTwo" name="tratamiento_blend_basico" id="tratamiento_blend_basico" data-on="SI" data-off="NO" value="SI">
				</div>
			</div>
	 </div>
</div>
<div id="modulo_progresivo">
<div class="container" id="progresivo_basico_div" style="display:none;padding-bottom: 30px;">
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Material</label>
		</div>
		<div class="col-sm-3">
      			<span class="badge badge-secondary">CR-39 W</span>
				<input type="radio" class="option-input radio"  name="progresivo_basico_material" value="CR-39 W">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">POLICARBONATO</span>
				<input type="radio" class="option-input radio"  name="progresivo_basico_material" value="POLICARBONATO">
			</div>
	</div>
	 <div class="row" id="progresivo_basico_tratamiento_div" style="padding-bottom: 30px;margin-top: 30px;">
	 	<div class="col-sm-3">
      		<label class="control-label">Tratamiento</label>
        </div>
        	<div class="row">
	      		<div class="col-sm-3">
	      			<span class="badge badge-secondary">SI</span>
					<input type="radio" class="option-input radio"  
					name="tratamiento_progresivo_basico" 
					id="tratamiento1_progresivo_basico" value="SI">
				</div>
				<div class="col-sm-3">
					<span class="badge badge-secondary">NO</span>
					<input type="radio" class="option-input radio"  
					name="tratamiento_progresivo_basico" 
					id="tratamiento2_progresivo_basico" value="NO">
				</div>
	      	</div>
	      	<div class="row" id="tratamiento_progresivo_basico_si" style="background-color: white; padding: 30px; display: none; margin-top: 30px;">
	      		<div class="col-sm-offset-2 col-sm-3">
	      			<span class="badge badge-secondary">ANTIRREFLEJANTE-BÁSICO</span><br>
					<input type="hidden" name="tratamiento_progresivo_basico_antirreflejante" value="NO">
                <input type="checkbox" class="squaredTwo" name="tratamiento_progresivo_basico_antirreflejante" id="tratamiento_progresivo_basico_antirreflejante" data-on="SI" data-off="NO" value="SI">
				</div>
				<div class="col-sm-offset-1 col-sm-3">
	      			<span class="badge badge-secondary">FOTOCROMÁTICO-BÁSICO</span><br>
					<input type="hidden" name="tratamiento_progresivo_basico_fotocromatico" value="NO">
                <input type="checkbox" class="squaredTwo" name="tratamiento_progresivo_basico_fotocromatico" id="tratamiento_progresivo_basico_fotocromatico" data-on="SI" data-off="NO" value="SI">
				</div>
			</div>
	 </div>
</div>
<div class="container" id="progresivo_premium_div" style="display:none;padding-bottom: 30px;">
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">KODAK:</label>
		</div>
		<div class="col-sm-3">
      			<span class="badge badge-secondary">UNIQUE</span>
				<input type="radio" class="option-input radio"  name="progresivo_premium_kodak" value="UNIQUE">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">EASY</span>
				<input type="radio" class="option-input radio"  name="progresivo_premium_kodak" value="EASY">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">PRECISE</span>
				<input type="radio" class="option-input radio"  name="progresivo_premium_kodak" value="PRECISE">
			</div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Material</label>
		</div>
		<div class="col-sm-3">
      			<span class="badge badge-secondary">ORMA</span>
				<input type="radio" class="option-input radio"  name="progresivo_premium_material" value="ORMA">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">AIRWEAR</span>
				<input type="radio" class="option-input radio"  name="progresivo_premium_material" value="AIRWEAR">
			</div>
	</div>
	<div class="row" id="progresivo_premium_tratamiento_div" style="margin-top: 30px;">
	 	<div class="col-sm-3"><br>
      		<label class="control-label">Tratamiento</label>
        </div>
        	
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio"  
				name="tratamiento_progresivo_premium" id="tratamiento_progresivo_premium1" value="SI">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio"  
				name="tratamiento_progresivo_premium" id="tratamiento_progresivo_premium2" value="NO">
			</div>
	      	</div>

<div class=" row col-xs-12" id="tratamiento_progresivo_premium_si_div" style="border: solid; border-color: grey;background-color: white; padding: 10px; display: none;margin: 30px; ">
	    <div class="row">
            <div class="col-sm-4">
            	<input type="hidden" name="tratamiento_progresivo_premium_antirreflejante" value="NO">
                <input type="checkbox" class="squaredTwo" 
                name="tratamiento_progresivo_premium_antirreflejante" 
                id="tratamiento_progresivo_premium_antirreflejante" data-on="SI" data-off="NO" value="SI">
                <label class="col-xs-6 label-text">Antirreflejante</label>
            </div>
            <div class="col-sm-4">
            	<input type="hidden" name="tratamiento_progresivo_premium_fotocromatico" value="NO">
                <input type="checkbox" class="squaredTwo" 
                name="tratamiento_progresivo_premium_fotocromatico" 
                id="tratamiento_progresivo_premium_fotocromatico" data-on="SI" data-off="NO" value="SI">
                <label class="col-xs-6 label-text">Fotocromático</label>
            </div>
        </div><br><br>
        <div class="row" id="tratamiento_progresivo_premium_antirreflejante_div" style="display: none;margin-bottom: 20px;">
        	<div class="col-sm-2">
        	 <label class="control-label"> Antirreflejante</label>
            </div>
			
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">CRIZAL EASY</span>
				<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL EASY">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRIZAL ALIZE</span>
				<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL ALIZE">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRIZAL FORTE</span>
				<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL FORTE">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRIZAL PREVENCIA</span>
				<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL PREVENCIA">
			</div>
      	
	    </div>
	    <div class="row" id="tratamiento_progresivo_premium_fotocromatico_div" style="display: none;margin-top: 30px;margin-bottom: 30px;">
        	<div class="col-sm-2">
        	 <label class="control-label">Fotocromático</label>
            </div>
			
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">TRANSITIONS GRIS</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS GRIS">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">TRANSITIONS CAFÉ</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS CAFÉ">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">TRANSITIONS VERDE</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS VERDE">
			</div>
		</div>
	</div>

	 </div>
</div>
</div>	 
	 </div>
<br><br>

	<div class="jumbotron col-xs-12" id="contacto" style="display: none;">
	 <div class="row">
	 	<h2>PENDIENTE SECCIÓN DE LENTES DE CONTACTO</h2>
	 </div>
	</div><br>
	<div class="jumbotron col-xs-12">
	 <div class="row">
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo" name="opciones[0]" value="Enviar">
                    						<label class="col-xs-6 label-text">Enviar al Área de Ventas</label>
                    					</div>
                    					<div class="col-sm-3">
                    						<input type="checkbox" class="squaredTwo" name="opciones[1]" value="Imprimir">
                    						<label class="col-xs-6 label-text">Imprimir</label>
                    					</div>
                    					<div class="col-sm-3">
                    						<input type="checkbox" class="squaredTwo" name="opciones[2]" checked value="Guardar" required>
                    						<label class="col-xs-6 label-text"> Guardar</label>
                    					</div>

								       <div class="col-sm-2">
								          <button id="submit" type="submit" class="btn btn-primary">
												<strong>Agregar</strong>	
										</button>
									</div>
     </div>
 </div>
{{-- ANTEOJOS --}}
</form>

@endsection