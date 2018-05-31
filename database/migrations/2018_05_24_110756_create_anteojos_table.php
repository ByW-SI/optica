<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnteojosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anteojos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            //------------------------------------

            $table->enum('tipo_anteojo', ['ARMAZÓN', 'LENTES DE CONTACTO','AMBOS'])->nullable();
            $table->enum('tipo_lente', ['MONOFOCAL', 'BIFOCAL','PROGRESIVO'])->nullable();
            $table->enum('monofocal', ['LEJOS', 'CERCA','AMBAS','SUB-CORRECCIÓN'])->nullable();
            $table->enum('bifocal', ['FLAT-TOP', 'BLEND'])->nullable();
            $table->enum('progresivo', ['BÁSICO', 'PREMIUM'])->nullable();
            //---------------------------------------------------------------
            $table->enum('monofocal_material', ['BÁSICO', 'PREMIUM'])->nullable();
            $table->enum('monofocal_material_basico', ['CR-39 W', 'HIGH-INDEX W','POLICARBONATO','CRISTAL W'])->nullable();
            $table->enum('monofocal_material_premium', ['ORMA', 'AIRWEAR'])->nullable();
            $table->enum('tratamiento', ['SI', 'NO'])->nullable();
            //----------------------------------------------------------
            $table->enum('antirreflejante', ['SI', 'NO'])->nullable();
            $table->enum('fotocromatico', ['SI', 'NO'])->nullable();
            $table->enum('polarizado', ['SI', 'NO'])->nullable();
            //----------------------------------------------------------
            $table->string('anti_basico')->nullable();
            $table->enum('anti_premium', ['TRIO','CRIZAL EASY', 'CRIZAL ALIZE','CRIZAL FORTE','CRIZAL PREVENCIA'])->nullable();
            $table->string('foto_basico')->nullable();
            $table->enum('foto_premium', ['TRANSITIONS GRIS', 'TRANSITIONS CAFÉ','TRANSITIONS VERDE','TRANSITIONS XTRACTIVE'])->nullable();
            $table->string('polarizado_basico')->nullable();
            $table->string('polarizado_premium')->nullable();
            //------------------------------------------------------------
            $table->enum('bifocal_flat_material',['POLICARBONATO','CR-39 W'])->nullable();
            $table->enum('tratamiento_flat',['SI','NO'])->nullable();
            $table->enum('tratamiento_flat_antirreflejante_basico',['SI','NO'])->nullable();
            $table->enum('tratamiento_flat_fotocromatico_basico',['SI','NO'])->nullable();
            $table->enum('bifocal_blend_material',['SI','NO'])->nullable();
            $table->enum('tratamiento_blend',['SI','NO'])->nullable();
            $table->enum('tratamiento_blend_basico',['SI','NO'])->nullable();
            //---------------------------------------------------------------
            $table->enum('progresivo_basico_material',['POLICARBONATO','CR-39 W'])->nullable();
            $table->enum('tratamiento_progresivo_basico',['SI','NO'])->nullable();
            $table->enum('tratamiento_progresivo_basico_antirreflejante',['SI','NO'])->nullable();
            $table->enum('tratamiento_progresivo_basico_fotocromatico',['SI','NO'])->nullable();
            //------------------------------------------------------------------
            $table->enum('progresivo_premium_kodak',['UNIQUE','EASY','PRECISE'])->nullable();
            $table->enum('progresivo_premium_material', ['ORMA', 'AIRWEAR'])->nullable();
            $table->enum('tratamiento_progresivo_premium',['SI','NO'])->nullable();
            $table->enum('tratamiento_progresivo_premium_antirreflejante',['SI','NO'])->nullable();
            $table->enum('tratamiento_progresivo_premium_fotocromatico',['SI','NO'])->nullable();
            $table->enum('anti_premium_progresivo', ['CRIZAL EASY', 'CRIZAL ALIZE','CRIZAL FORTE','CRIZAL PREVENCIA'])->nullable();
            $table->enum('foto_premium_progresivo', ['TRANSITIONS GRIS', 'TRANSITIONS CAFÉ','TRANSITIONS VERDE'])->nullable();
            //---------------------------------------------------------------------
            $table->string('opciones')->nullable();
            //------------------------------------
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anteojos');
    }
}
