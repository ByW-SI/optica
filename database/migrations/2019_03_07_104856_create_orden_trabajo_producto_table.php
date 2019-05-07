<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdentrabajoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajo_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('descuento')->nullable();
            $table->integer('producto_id')->unsigned();
            $table->integer('orden_trabajo_id')->unsigned();
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
        Schema::dropIfExists('orden_trabajo_producto');
    }
}
