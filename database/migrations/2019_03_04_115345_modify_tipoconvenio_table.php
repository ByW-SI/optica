<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTipoconvenioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipoconvenio', function (Blueprint $table) {
            $table->integer('num_tramites')->nullable();
            $table->integer('monto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipoconvenio', function (Blueprint $table) {
            $table->dropColumn('num_tramites');
            $table->dropColumn('monto');
        });
    }
}
