<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteHistorialMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_historial_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->enum('alergia', ['SI', 'NO']);
            $table->string('cual_alergia')->nullable();
            $table->string('tratamiento_alergia')->nullable();
            $table->enum('enfermedad', ['SI', 'NO']);
            $table->string('diabetes');
            $table->string('epilepsia');
            $table->string('hipertension');
            $table->string('migraña');
            $table->string('asma');
            $table->string('otra');
            $table->string('enfermedad_cronica');
            $table->enum('tratamiento', ['SI', 'NO']);
            $table->string('tratamiento_actual');
            $table->enum('embarazo', ['SI', 'NO']);
            $table->string('tiempo_embarazo');
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
        Schema::dropIfExists('paciente_historial_medicos');
    }
}
