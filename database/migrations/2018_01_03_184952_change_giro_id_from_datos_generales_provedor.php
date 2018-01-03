<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGiroIdFromDatosGeneralesProvedor extends Migration
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
        Schema::table('datos_generales_provedor', function (Blueprint $table) {
            //
            $table->integer('giro_id')->nullable()->unsigned()->change();
            $table->integer('forma_contacto_id')->nullable()->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datos_generales_provedor', function (Blueprint $table) {
            //
        });
    }
}
