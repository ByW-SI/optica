<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned(); // eliminado en migraciones posteriores
            $table->foreign('paciente_id')->references('id')->on('pacientes'); // eliminado en migraciones posteriores
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno')->nullable();
            $table->string('edad')->nullable(); // cambia a integer en migraciones posteriores
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['Masculino', 'Femenino','Otro'])->nullable(); // cambia a string en migraciones posteriores
            $table->string('relacion'); // cambia de 'relacion' a 'parentesco' en migraciones posteriores
            $table->string('tel_casa')->nullable();
            $table->string('tel_cel')->nullable();
            $table->timestamps();
            $table->softDeletes(); // eliminado en migraciones posteriores
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutors');
    }
}
