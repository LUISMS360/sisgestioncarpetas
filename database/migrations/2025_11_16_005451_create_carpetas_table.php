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
        Schema::create('carpetas', function (Blueprint $table) {
            $table->id();  
            $table->foreignId('profesor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('fut_id')->constrained('futs')->onDelete('cascade');
            $table->enum('',['revisado','pendiente','archivada'])->default('pendiente');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->integer('progreso')->default(0);
            $table->date('fecha')->nullable();
            $table->boolean('hj_aceptacion_prtc_preprofesional')->default(false);
            $table->boolean('hj_monitoreo_prtc_preprofesional')->default(false);
            $table->boolean('hj_evaluacion_prtc_preprofesional')->default(false);
            $table->boolean('hj_informe_prtc_preprofesional')->default(false);
            $table->boolean('hj_resumen_prtc_preprofesional')->default(false);
            $table->enum('modulo',['I','II','III'])->nullable();
            $table->string('nota')->nullable();
            $table->string('nota_letra')->nullable();
            $table->string('lugar')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carpetas');
    }
};
