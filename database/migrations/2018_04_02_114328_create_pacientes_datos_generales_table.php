<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesDatosGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_datos_generales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->string('ocupacion');
            $table->string('convenio');
            $table->string('calle');
            $table->string('numext');
            $table->string('numint')->nullable();
            $table->string('cp')->nullable();
            $table->string('municipio');
            $table->string('estado');
            $table->string('telcasa')->nullable();
            $table->string('teloficina')->nullable();
            $table->string('telcelular')->nullable();
            $table->string('email')->nullable();
            $table->string('trabajo')->nullable();
            $table->string('servicio')->nullable();
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
        Schema::dropIfExists('pacientes_datos_generales');
    }
}
