<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Edificio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edificio', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_edificio',3);
            $table->string('nombre_edificio', 100);
            $table->integer('codigo_gerente');
            $table->float('honorarios_edif', 13, 2);
            $table->string('ubicacion', 30);
            $table->string('cant_apart', 3);
            $table->string('direccion',250);
            $table->integer('codigo_postal');
            $table->float('porc_fondo_reserva',5, 2);
            $table->float('iva', 5, 2);
            $table->float('porc_intereces_mor',5, 2);
            $table->float('porc_comision_cheque_devuelto',5, 2);
            $table->string('comentario', 250)->nullable();
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
        Schema::dropIfExists('edificio');
    }
}
