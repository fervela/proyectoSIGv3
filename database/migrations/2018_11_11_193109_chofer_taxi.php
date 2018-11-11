<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChoferTaxi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_taxi', function (Blueprint $table) {
            $table->unsignedInteger('taxi');
            $table->unsignedInteger('chofer');
            $table->date('fechainicio')->nullable();
            $table->date('fechafin')->nullable();
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
