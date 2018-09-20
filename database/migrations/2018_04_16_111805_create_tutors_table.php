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
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            //--------------------------------------------
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno')->nullable();
            $table->string('edad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['Masculino', 'Femenino','Otro']);
            $table->string('relacion');
            $table->string('tel_casa')->nullable();
            $table->string('tel_cel');
             //------------------------------------------------
            $table->timestamps();
            $table->softDeletes();
            
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
