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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('primerNombre',50);
            $table->string('segundoNombre',50)->nullable();
            $table->string('primerApellido',50);
            $table->string('segundoApellido',50)->nullable();
            $table->string('apellidoCasada',50)->nullable();
            $table->date('birthDay', $precision = 0)->nullable();
            $table->string('dpi',20)->nullable();
            $table->string('profesion',30)->default('')->nullable();
            $table->string('foto')->nullable();
            $table->integer('aniosLaborando')->default(0)->nullable();
            $table->float('salario')->default(0)->nullable();
            $table->string('mail');
            $table->string('password');
            $table->string('solicitud')->nullable();
            $table->string('role');
            $table->string('estado')->default('activo');
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
        Schema::dropIfExists('users');
    }
};
