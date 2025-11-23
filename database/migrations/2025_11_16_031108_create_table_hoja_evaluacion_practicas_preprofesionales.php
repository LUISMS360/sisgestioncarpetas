<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// TODO: COMENTARIO XD
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_hoja_evaluacion_practicas_preprofesionales', function (Blueprint $table) {
            $table->id();
            $table->string('columna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_hoja_evaluacion_practicas_preprofesionales');
    }
};
