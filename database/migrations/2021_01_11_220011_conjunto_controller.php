<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConjuntoController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjunto', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_conjunto", 120);
            $table->string("codigo_identificativo", 40);
            $table->string("direccion", 240);
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->timestamps();
        });


        Schema::create('apartamento', function (Blueprint $table) {
            $table->id();
            $table->string("num_apartamento", 20);
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('conjunto_id');

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('conjunto_id')->references('id')->on('conjunto');
            $table->timestamps();
        });







        Schema::create('usuario_conjunto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('conjunto_id');


            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('conjunto_id')->references('id')->on('conjunto');



            //$table->timestamps()->disabled();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_conjunto');
        Schema::dropIfExists('apartamento');
        Schema::dropIfExists('conjunto');
    }
}
