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
            $table->string('marca');
            $table->string('modelo');
            $table->string('color');
            $table->string('medidas');
            $table->string('unidad');
            $table->string('foto');
            $table->double('precio', 15, 8);
            $table->integer('cantidad');
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
