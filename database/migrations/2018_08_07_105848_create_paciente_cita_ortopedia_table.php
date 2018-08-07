<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteCitaOrtopediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_cita_ortopedia', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->boolean('cita');
            $table->string('path_image');
            $table->text('diagnostico')->nullable();
            $table->text('recomendacion')->nullable();
            $table->text('tratamiento')->nullable();
            $table->string('tipo');
            $table->string('medida');
            $table->string('plantilla');
            $table->string('medida_plant');
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
        Schema::dropIfExists('paciente_cita_ortopedia');
    }
}
