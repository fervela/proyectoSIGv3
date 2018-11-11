<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('hora');
            $table->string('origenlatitud');
            $table->string('origenlongitud');
            $table->string('destinolatitud');
            $table->string('destinolongitud');
            $table->string('pasajerolatitud');
            $table->string('pasajerolongitud');
            $table->char('tipo',1);
            $table->char('parilla',1);
            $table->char('aire',1);
            $table->string('glos')->nullable();
            $table->integer('cali')->nullable();
            $table->integer('stas')->nullable();
            $table->unsignedInteger('pasajero');
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
        Schema::dropIfExists('solicituds');
    }
}
