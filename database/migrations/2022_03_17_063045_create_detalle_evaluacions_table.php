<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_evaluacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->references('id')->on('users');
            $table->foreignId('pregunta_id')->references('id')->on('preguntas');
            $table->foreignId('alternativa_id')->references('id')->on('alternativas');
            $table->integer('puntaje');
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
        Schema::dropIfExists('detalle_evaluacions');
    }
}
