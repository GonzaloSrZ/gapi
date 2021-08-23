<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('autor1');
            $table->string('autor2')->nullable();
            $table->string('autor3')->nullable();
            $table->text('nota')->nullable();
            $table->timestamp('fechadepublicacion');
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->unsignedBigInteger('subproyecto_id')->nullable();
            $table->foreign('subproyecto_id')->references('id')->on('subproyectos');
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
        Schema::dropIfExists('publicacions');
    }
}
