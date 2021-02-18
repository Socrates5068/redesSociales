<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->text('mensaje', 2000);
            $table->string('imagen', 100)->nullable();
            $table->uuid('uuid', 50)->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea el mensaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunicados');
    }
}
