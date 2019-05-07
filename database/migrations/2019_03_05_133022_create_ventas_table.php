<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id');
            $table->date('fecha_venta')->nullable();
            $table->string('sucursal')->nullable();
            $table->string('numero_venta')->unique();
            $table->string('id_paciente')->nullable();  //este campo en la tabla paciente aparece como identificador
            $table->date('fecha_entrega')->nullable();
            $table->string('tipo_convenio')->nullable();
            $table->integer('cantidad_tramites')->nullable();
            $table->string('numero_autorizacion')->nullable();
            $table->string('personal')->nullable();
            $table->string('convenio')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('total')->nullable();
            $table->integer('monto_convenio')->nullable();
            $table->float('total_pagar')->nullable();
            $table->string('forma_pago')->nullable();
            $table->string('num_tarjeta')->nullable();
            $table->string('nombre_dueno_tarjeta')->nullable();
            $table->string('banco')->nullable();
            $table->string('ultimos_digitos')->nullable();
            $table->float('monto_pagar')->nullable();
            $table->string('numero_referencia')->nullable();
            $table->string('saldo')->nullable();
            $table->date('fecha_deposito')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
