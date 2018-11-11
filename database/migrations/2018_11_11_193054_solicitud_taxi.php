<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolicitudTaxi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_taxi', function (Blueprint $table) {
            $table->unsignedInteger('taxi');
            $table->unsignedInteger('solicitud');
            $table->string('horainicio')->nullable();
            $table->string('horafin')->nullable();
            $table->char('estado',1);
            $table->integer('calificacion');
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
        //
    }
}
