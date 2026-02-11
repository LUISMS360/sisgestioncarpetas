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
        Schema::table('carpetas', function (Blueprint $table) {
            $table->boolean('hj_aceptacion_prtc_preprofesional')->default(false);
            $table->boolean('hj_monitoreo_prtc_preprofesional')->default(false);
            $table->boolean('hj_evaluacion_prtc_preprofesional')->default(false);
            $table->boolean('hj_informe_prtc_preprofesional')->default(false);
            $table->boolean('hj_resumen_prtc_preprofesional')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carpetas', function (Blueprint $table) {
            //
        });
    }
};
