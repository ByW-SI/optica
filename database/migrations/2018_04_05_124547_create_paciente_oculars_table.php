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
            $table->enum('padecimientos', ['SI', 'NO']);
            //--------------------------------------------
            $table->string('cirug_1')->nullable();
            $table->string('cirug_2')->nullable();
            $table->string('cirug_3')->nullable();
            //--------------------------------------------
            $table->string('padecimientos_array')->nullable();//incluye padec_text
            //--------------------------------------------
            $table->enum('problema_visual', ['LEJOS','CERCA','AMBAS'])->nullable();
            $table->enum('usuario_lentes', ['SI','NO','OCASIONALMENTE']);
            $table->integer('edad_lentes')->nullable();
            $table->enum('molestia_luz', ['SI','NO','REGULAR']);
            $table->enum('usuario_computadora', ['SI','NO']);
            //---------------------------------------------
            $table->string('antecedente_array')->nullable();//incluye antecedente_text
            //---------------------------------------------
            $table->string('snellen_1')->nullable();
            $table->string('snellen_2')->nullable();
            //---------------------------------------------
            $table->enum('unilateral_lejos',['ORTO','ENDO','EXO','HIPER','HIPO'])->nullable();
            $table->enum('unilateral_cerca',['ORTO','ENDO','EXO','HIPER','HIPO'])->nullable();
            //-------------------------------------------------
            $table->enum('alternamente_lejos',['ORTO','ENDO','EXO','HIPER','HIPO'])->nullable();
            $table->enum('alternamente_cerca',['ORTO','ENDO','EXO','HIPER','HIPO'])->nullable();
            //-----------------------------------------------
            $table->string('queratometria_od_plana')->nullable();
            $table->string('queratometria_od_curva')->nullable();
            $table->string('queratometria_od_eje')->nullable();
            $table->string('queratometria_oi_plana')->nullable();
            $table->string('queratometria_oi_curva')->nullable();
            $table->string('queratometria_oi_eje')->nullable();
            //-----------------------------------------------
            $table->string('vision_estereo')->nullable();
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
            $table->text('anexos')->nullable();
            //-----------------------------------------------
            $table->string('archivo_imagen')->nullable();
            //-----------------------------------------------
            $table->date('fecha_tono')->nullable();
            $table->string('hora_tono')->nullable();
            $table->string('tonometria_od')->nullable();
            $table->string('tonometria_oi')->nullable();
            //-----------------------------------------------
            $table->string('esf_od')->nullable();
            $table->string('cil_od')->nullable();
            $table->string('eje_od')->nullable();
            $table->string('add_od')->nullable();
            $table->string('av_od')->nullable();

            $table->string('dnp_od_lejos')->nullable();
            $table->string('dnp_od_cerca')->nullable();
            //----------------------------------------------
            $table->string('esf_oi')->nullable();
            $table->string('cil_oi')->nullable();
            $table->string('eje_oi')->nullable();
            $table->string('add_oi')->nullable();
            $table->string('av_oi')->nullable();

            $table->string('dnp_oi_lejos')->nullable();
            $table->string('dnp_oi_cerca')->nullable();
            //------------------------------------------------
            $table->string('refractivo')->nullable();
            $table->string('patologico')->nullable();
            $table->string('binocularidad')->nullable();
            $table->string('optometrista');
           
            $table->string('opciones')->nullable();//incluye Enviar,Imprimir,Guardar
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
