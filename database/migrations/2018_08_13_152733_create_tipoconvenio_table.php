<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoconvenioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoconvenio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convenio_id')->unsigned();
            $table->foreign('convenio_id')->references('id')->on('convenios');
            $table->integer('desc_prod')->unsigned()->nullable();
            $table->integer('num_prod')->unsigned()->nullable();
            $table->text('nombre');
            $table->integer('desc_cita')->unsigned()->nullable();
            $table->integer('num_cita')->unsigned()->nullable();
            $table->text('descripcion');
            $table->date('valido_inicio');
            $table->date('valido_fin');
            $table->string('aplican')->nullable();
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
        Schema::dropIfExists('tipoconvenio');
    }
}
