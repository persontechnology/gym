<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('asistencia_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();

            $table->foreign('asistencia_id')->references('id')->on('asistencia')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista');
    }
}
