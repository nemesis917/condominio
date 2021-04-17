<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Propietario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartamento', function (Blueprint $table) {
            $table->id();
            $table->string('correo', 80);
            $table->string('num_inmueble', 10);
            $table->string('nombre', 30);
            $table->string('apellido', 30);
            $table->string('estado_inmueble',3);
            $table->float('alicuota', 14, 8);
            $table->float('gastos_administracion', 14, 2);
            $table->string('telefono_oficina', 12)->nullable();
            $table->string('telefono_habitacion', 12);
            $table->bigInteger('edificio_id')->unsigned();

            $table->foreign('edificio_id')->references('id')->on('edificio');
            $table->timestamps();
        });


        Schema::create('user_vivienda', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('vivienda_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vivienda_id')->references('id')->on('apartamento');
            $table->timestamps();
        });

        Schema::create('edificio_empresa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->bigInteger('edificio_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->foreign('edificio_id')->references('id')->on('edificio');
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
        Schema::dropIfExists('edificio_empresa');
        Schema::dropIfExists('user_vivienda');
        Schema::dropIfExists('edificio_apartamento');
        Schema::dropIfExists('apartamento');
    }
}
