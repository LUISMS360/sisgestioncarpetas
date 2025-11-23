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
        Schema::table('table_hoja_evaluacion_practicas_preprofesionales', function (Blueprint $table) {
            $table->foreignId('carpeta_id')->constrained('carpetas')->name('fk_hoja_evaluacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_table_hoja_evalucacion_practicas_preprofesionales', function (Blueprint $table) {
            //
        });
    }
};
