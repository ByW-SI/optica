<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductogeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productogenerals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigobarras');
            $table->string('sku');
            $table->string('negocio');
            $table->string('proveedor');
            $table->string('descripcion');
            $table->string('producto');
            $table->string('marca');
            $table->string('modelo');
            $table->string('color');
            $table->string('unidad');
            $table->string('foto');
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
        Schema::dropIfExists('productogenerals');
    }
}
