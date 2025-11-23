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
        Schema::table('table_hoja_monitoreo_practicas_preprofesionales', function (Blueprint $table) {
            $table->date('fecha')->nullable();
            $table->string('nombre_practicante');
            $table->string('carrera_profesional');
            $table->string('modulo_tecnico')->nullable();
            $table->string('centro_practicas');
            $table->date('fecha_practica')->nullable();
            $table->string('hora_inicio')->nullable();
            $table->string('hora_termino')->nullable();
            $table->string('nombre_docente');
            $table->string('nro_vista')->nullable();
            $table->date('fecha_supervision')->nullable();
            $table->text('tareas_actividades');
            $table->string('avance');
            $table->string('observacion')->nullable();
            $table->string('dificultades_practica')->nullable();
            $table->string('sugerencias_recomendaciones')->nullable();
            $table->string('firma_docente');
            $table->string('firma_practicante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_hoja_monitoreo_practicas_preprofesionales', function (Blueprint $table) {
            //
        });
    }
};
