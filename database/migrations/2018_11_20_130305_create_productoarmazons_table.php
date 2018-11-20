<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoarmazonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoarmazons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigobarras');
            $table->string('sku');
            $table->string('negocio');
            $table->string('proveedor');
            $table->string('descripcion');
            $table->string('familia');
            $table->string('materiales');
            $table->string('rangos');
            $table->string('color');
            $table->string('tratamientos');
            $table->string('unidad');
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
        Schema::dropIfExists('productoarmazons');
    }
}
