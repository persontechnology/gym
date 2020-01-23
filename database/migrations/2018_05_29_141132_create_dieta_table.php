<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dieta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('titulo');
            $table->text('detalle');
            $table->decimal('peso',9,2);
            $table->decimal('altura',9,2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dieta');
    }
}
