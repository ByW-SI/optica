<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableToColumnContratoIdInEmpleadosdatoslabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* CODIGO PARA QUE DBAL PUEDA LEER TABLAS CON COLUMNAS ENUM*/
        $platform = Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('empleadosdatoslab', function (Blueprint $table) {
            //
            $table->integer('contrato_id')->nullable()->unsigned()->change();
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
