<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('cantidadActual');
            $table->integer('cantidadExistente');

            $table->unsignedBigInteger('maquina_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();

            $table->foreign('maquina_id')->references('id')->on('maquina')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario');
    }
}
