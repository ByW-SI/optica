<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosdatoslabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleadosdatoslab', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->date('fechaactualizacion');
            $table->enum('periodopaga',['Semanal','Quincenal','Mensual']);
            $table->enum('regimen',['Sueldos y salarios','Jubilados','Pensionados']);
            $table->string('hcomida');
            $table->string('lugartrabajo');
            $table->integer('contrato_id')->unsigned()->nullable();
            $table->foreign('contrato_id')->references('id')->on('tipocontrato');
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->integer('puesto_id')->unsigned()->nullable();
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->decimal('salarionom',8,2)->nullable();
            $table->decimal('salariodia',8,2)->nullable();
            $table->string('prestaciones')->nullable();
            $table->string('hentrada')->nullable();
            $table->string('hsalida')->nullable();
            $table->date('fechacontratacion')->nullable();
            $table->string('banco')->nullable();;
            $table->string('cuenta')->nullable();
            $table->string('clabe')->nullable();
            $table->integer('almacen_id')->unsigned()->nullable();
            $table->foreign('almacen_id')->references('id')->on('almacens');
            $table->date('fechabaja')->nullable();
            $table->integer('tipobaja_id')->nullable()->unsigned();
            $table->foreign('tipobaja_id')->references('id')->on('tipobaja');
            $table->text('comentariobaja')->nullable();
            $table->boolean('bonopuntualidad')->default(false);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleadosdatoslab');
    }
}
