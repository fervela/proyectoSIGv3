<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tipo');
            $table->text('tokenfirebase')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->char('sexo',1);
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('imei')->nullable();
            $table->string('nlicencia')->nullable();
            $table->char('categoria',1)->nullable();
            $table->date('fechavencimiento')->nullable();
            $table->text('foto')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
