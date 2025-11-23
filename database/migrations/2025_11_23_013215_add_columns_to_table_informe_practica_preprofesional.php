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
        Schema::table('table_informe_practica_preprofesional', function (Blueprint $table) {
            $table->string('nombre_practicante');
            $table->string('carrera_profesional');
            $table->string('modulo_tecnico');
            $table->string('razon_social');
            $table->string('actividad_emp_inst')->nullable();
            $table->string('lugar_practica');
            $table->string('inicio_practica');
            $table->string('termino');
            $table->string('horas_acumuladas');
            $table->string('nombres_jefe');
            $table->string('cargo');
            $table->text('organizacion_practicas_emp_inst');
            $table->text('metodos_tecnicas_inst');
            $table->text('secuencia_tareas');
            $table->text('logros_alcanzados');
            $table->text('dificultades_presentadas');
            $table->text('alternativas_solucion');
            $table->text('bibliografia')->nullable();
            $table->text('recomendaciones');
            $table->string('firma_responsable')->nullable();
            $table->string('firma_practicante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_informe_practica_preprofesional', function (Blueprint $table) {
            //
        });
    }
};
