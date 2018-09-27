<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrabajoAndServicioColumnsToPacientesDatosGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes_datos_generales', function (Blueprint $table) {
            $table->string('trabajo')->nullable();
            $table->string('servicio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes_datos_generales', function (Blueprint $table) {
            $table->dropColumn('trabajo');
            $table->dropColumn('servicio');
        });
    }
}
