<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->integer('grupo_id')->unsigned();
            
            $table->foreign('estudiante_id')->references('id')->on('estudiante')->cascadeOnDelete();
            $table->foreign('grupo_id')->references('id')->on('grupo')->cascadeOnDelete();

            $table->date('fecha')->nullable();            
            $table->time('HoraEntrada', precision: 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia');
    }
};
