<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->string('marca');
            $table->string('modelo');
            $table->string('anio');
            $table->string('color');
            $table->integer('tipo');
            $table->integer('nasiento');
            $table->integer('npuerta');
            $table->char('parilla',1);
            $table->char('aire',1);
            $table->text('foto');
            $table->unsignedInteger('propietario');
            $table->char('estado',1);
            $table->string('condicion')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('taxis');
    }
}
