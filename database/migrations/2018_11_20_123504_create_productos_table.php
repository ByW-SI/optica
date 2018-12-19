<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id'); // sku interno
            $table->string('seccion'); // necesario
            $table->string('sku'); // gral
            $table->string('sku_interno'); // gral
            $table->string('negocio'); // gral
            $table->integer('provedor_id')->unsigned();
            $table->foreign('provedor_id')->references('id')->on('proveedores');
            $table->string('descripcion'); // gral.
            $table->string('producto')->nullable(); // ortopedia
            $table->string('producto_abr')->nullable(); // ortopedia
            $table->string('familia')->nullable(); // micas
            $table->string('materiales')->nullable(); // micas
            $table->string('materiales_abr')->nullable(); // micas
            $table->string('rangos')->nullable(); // micas
            $table->string('marca')->nullable(); // no micas
            $table->string('marca_abr')->nullable(); // no micas
            $table->string('modelo')->nullable(); // no micas
            $table->string('modelo_abr')->nullable(); // no micas
            $table->decimal('talla')->nullable(); // ortopedia
            $table->string('color')->nullable(); // gral.
            $table->string('color_abr')->nullable(); // gral.
            $table->string('tratamiento')->nullable(); // micas
            $table->string('tratamiento_abr')->nullable(); // micas
            $table->decimal('medidas')->nullable(); // armazon
            $table->decimal('medidas_abr')->nullable(); // armazon
            $table->string('unidad')->nullable(); // ambiguo
            $table->string('renta')->nullable(); // ambiguo
            $table->string('foto1')->nullable(); // gral.
            $table->string('foto2')->nullable(); // gral.
            $table->string('foto3')->nullable(); // gral.
            $table->timestamps(); // fechas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
