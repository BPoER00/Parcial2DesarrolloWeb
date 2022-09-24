<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRol');
            $table->unsignedBigInteger('idFacultad');
            $table->string('carne', 255);
            $table->string('nombre', 60);
            $table->string('apellido', 60);
            $table->string('dpi', 20);
            $table->string('nit', 20);
            $table->string('email', 255);
            $table->string('telefono', 255);
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idRol')->references('id')->on('rol');
            $table->foreign('idFacultad')->references('id')->on('facultad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
};
