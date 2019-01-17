<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutors', function (Blueprint $table) {
            DB::statement("ALTER TABLE tutors MODIFY sexo VARCHAR(191) NULL");
            $table->dropForeign(['paciente_id']);
            $table->dropColumn('paciente_id');
            $table->integer('edad')->nullable()->change();
            $table->dropColumn('relacion');
            $table->dropColumn('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutors', function (Blueprint $table) {
            $table->string('relacion');
            $table->string('edad')->nullable()->change();
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->softDeletes();
        });
    }
}
