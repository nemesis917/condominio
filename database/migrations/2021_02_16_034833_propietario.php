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
            $table->bigInteger('alicuota');
            $table->float('gastos_administracion', 11, 2);
            $table->integer('telefono_oficina')->nullable();
            $table->integer('telefono_habitacion');
            $table->bigInteger('edificio_id')->unsigned();

            $table->foreign('edificio_id')->references('id')->on('edificio');
            $table->timestamps();
        });


        Schema::create('usuario_apartamento', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('apartamento_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('apartamento_id')->references('id')->on('apartamento');
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
        Schema::dropIfExists('usuario_apartamento');
        Schema::dropIfExists('edificio_apartamento');
        Schema::dropIfExists('apartamento');
    }
}
