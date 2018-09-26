<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRequiredOnTutors extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutors', function (Blueprint $table) {
            $table->string('tel_cel')->nullable()->change();
            DB::statement('ALTER TABLE tutors CHANGE COLUMN sexo sexo VARCHAR(30)');
            $table->string('sexo')->nullable()->change();
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
            $table->string('tel_cel')->change();
            $table->string('sexo')->change();
        });
    }
}
