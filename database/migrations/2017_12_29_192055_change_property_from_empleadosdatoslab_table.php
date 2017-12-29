<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePropertyFromEmpleadosdatoslabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleadosdatoslab', function (Blueprint $table) {
            //
            $table->dropColumn('periodopaga');
            $table->dropColumn('regimen');
            $table->integer('contrato_id')->nullable()->unsigned()->change();
            $table->enum('periodopaga',['Semanal','Quincenal','Mensual']);
            $table->enum('regimen',['Sueldos y salarios','Jubilados','Pensionados']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleadosdatoslab', function (Blueprint $table) {
            //
        });
    }
}
