<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteOcularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_oculars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            //--------------------------------------------
            $table->enum('cirugias', ['SI', 'NO']);
            $table->string('cirug_1')->nullable();
            $table->string('cirug_2')->nullable();
            $table->string('cirug_3')->nullable();
            //--------------------------------------------
            $table->enum('padecimientos', ['SI', 'NO']);
            $table->string('padecimientos_array')->nullable();
            //--------------------------------------------
            $table->enum('problema_visual', ['LEJOS', 'CERCA','AMBAS']);
            $table->enum('usuario_lentes', ['SI', 'NO','OCASIONALMENTE']);
            $table->integer('edad_lentes')->nullable();
            $table->enum('molestia_luz', ['SI', 'NO','REGULAR']);
            $table->enum('usuario_computadora', ['SI', 'NO']);
            //---------------------------------------------
            $table->string('antecedente_array')->nullable();
            //---------------------------------------------
            $table->string('snellen_1');
            $table->string('snellen_2');
            $table->string('dnp_od_lejos');
            $table->string('dnp_od_cerca');
            $table->string('dnp_oi_lejos');
            $table->string('dnp_oi_cerca');
            //----------------------------------------------
            $table->enum('unilateral_lejos',['ORTO','ENDO','EXO','HIPER','HIPO']);
            $table->enum('unilateral_cerca',['ORTO','ENDO','EXO','HIPER','HIPO']);
            $table->enum('alternamente_lejos',['ORTO','ENDO','EXO','HIPER','HIPO']);
            $table->enum('alternamente_cerca',['ORTO','ENDO','EXO','HIPER','HIPO']);
            //-----------------------------------------------
            $table->string('queratometria_od_plana');
            $table->string('queratometria_od_curva');
            $table->string('queratometria_od_eje');
            $table->string('queratometria_oi_plana');
            $table->string('queratometria_oi_curva');
            $table->string('queratometria_oi_eje');
            //-----------------------------------------------
            $table->string('vision_estereo');
            //-----------------------------------------------
            $table->string('papila_od')->nullable();
            $table->string('papila_oi')->nullable();
            $table->string('excavacion_od')->nullable();
            $table->string('excavacion_oi')->nullable();
            $table->string('radio_od')->nullable();
            $table->string('radio_oi')->nullable();
            $table->string('profundidad_od')->nullable();
            $table->string('profundidad_oi')->nullable();
            $table->string('vasos_od')->nullable();
            $table->string('vasos_oi')->nullable();
            $table->string('rel_od')->nullable();
            $table->string('rel_oi')->nullable();
            $table->string('macula_od')->nullable();
            $table->string('macula_oi')->nullable();
            $table->string('reflejo_od')->nullable();
            $table->string('reflejo_oi')->nullable();
            $table->string('retina_od')->nullable();
            $table->string('retina_oi')->nullable();
            //-----------------------------------------------
            $table->string('nombre_archivo')->nullable();
            $table->string('url_archivo')->nullable();
            //-----------------------------------------------
            $table->text('anexos')->nullable();
            //-----------------------------------------------
            $table->date('fecha_tono')->nullable();
            $table->string('hora_tono')->nullable();
            $table->string('tonometria_od');
            $table->string('tonometria_oi');
            //-----------------------------------------------
            $table->string('esf_od')->nullable();
            $table->string('esf_oi')->nullable();
            $table->string('cil_od')->nullable();
            $table->string('cil_oi')->nullable();
            $table->string('eje_od')->nullable();
            $table->string('eje_oi')->nullable();
            $table->string('add_od')->nullable();
            $table->string('add_oi')->nullable();
            $table->string('av_od')->nullable();
            $table->string('av_oi')->nullable();
            //------------------------------------------------
            $table->string('refractivo')->nullable();
            $table->string('patologico')->nullable();
            $table->string('binocularidad')->nullable();
            $table->string('optometrista');
            //------------------------------------------------
            $table->enum('tipo_anteojo', ['ARMAZÓN', 'LENTES DE CONTACTO','AMBOS'])->nullable();
            $table->enum('tipo_lente', ['Monofocal', 'Bifocal','Progresivo'])->nullable();
            $table->enum('monofocal', ['LEJOS', 'CERCA','AMBAS','SUB-CORRECION'])->nullable();
            $table->enum('bifocal', ['FLAT-TOP', 'BLEND'])->nullable();
            $table->enum('material', ['CR-39 W', 'HIGH-INDEX W','POLICARBONATO','CRISTAL W'])->nullable();
            $table->enum('tratamiento', ['SI', 'NO'])->nullable();

            $table->enum('antirreflejante', ['SI', 'NO'])->nullable();
            $table->enum('tipo_antirreflejante', ['Básico', 'Premium'])->nullable();
            $table->enum('anti_premium', ['CRIZAL EASY', 'CRIZAL ALIZE','CRIZAL FORTE','CRIZAL PREVENCIA'])->nullable();

            $table->enum('fotocromatico', ['SI', 'NO'])->nullable();
            $table->enum('tipo_fotocromatico', ['Básico', 'Premium'])->nullable();
            $table->enum('foto_premium', ['TRANSITIONS GRIS', 'TRANSITIONS CAFÉ','TRANSITIONS VERDE'])->nullable();

            $table->enum('polarizado', ['SI', 'NO'])->nullable();
            $table->enum('tipo_polarizado', ['Básico', 'Premium (Xperio)'])->nullable();
            //------------------------------------------------
            $table->string('operacion_documento');
            //------------------------------------------------
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente_oculars');
    }
}
