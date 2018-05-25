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
