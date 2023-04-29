<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroParqueoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_parqueos', function (Blueprint $table) {
            $table->id();
            $table->time('hora_ini');
            $table->time('hora_fin')->nullable();
            $table->unsignedBigInteger('sitio');
            $table->foreign('sitio')->references('id')->on('sitios')
                                                        ->onUpdate('cascade')
                                                        ->onDelete('cascade');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')
                                                            ->onUpdate('cascade')
                                                            ->onDelete('cascade');
            $table->string('matricula');
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
        Schema::dropIfExists('registro_parqueos');
    }
}
