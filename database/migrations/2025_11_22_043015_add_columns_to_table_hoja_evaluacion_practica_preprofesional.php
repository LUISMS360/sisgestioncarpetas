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
            $table->date('fecha')->nullable();
            $table->string('estudiante');
            $table->string('carrera');
            $table->string('modulo')->nullable();
            $table->string('periodo_evaluacion')->nullable();
            $table->string('razon_social_empresa');
            $table->string('direcion');
            $table->string('telefono');
            $table->string('supervisor');
            $table->string('nombre');
            $table->string('cargo');
            $table->string('lugar');
            $table->string('oficina')->nullable();
            $table->string('taller')->nullable();
            $table->string('laboratorio')->nullable();
            $table->string('granja o campo')->nullable();
            $table->string('almacen')->nullable();
            $table->string('otros')->nullable();
            $table->date('periodo_inicio');
            $table->date('periodo_final');
            $table->string('total_horas');
            $table->string('tareas_asignadas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_hoja_evaluacion_practica_preprofesional', function (Blueprint $table) {
            //
        });
    }
};
