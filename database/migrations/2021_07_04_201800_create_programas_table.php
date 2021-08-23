<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('disciplina');
            $table->string('categoria');
            $table->integer('cantidaddeproyectos')->nullable();
            $table->date('fechadeinicio')->nullable();
            $table->date('fechadefin')->nullable();
            $table->date('fechadealta')->nullable();
            $table->integer('estado');
            $table->string('palabrasclaves')->nullable();
            $table->integer('user_dni');
            $table->foreign('user_dni')->references('dni')->on('users');
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
        Schema::dropIfExists('programas');
    }
}
