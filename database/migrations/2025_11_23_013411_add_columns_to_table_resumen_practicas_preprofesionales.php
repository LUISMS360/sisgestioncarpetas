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
        Schema::table('table_hoja_resumen_practicas_preprofesionales', function (Blueprint $table) {
            $table->string('nombre_practicante');
            $table->string('carrera_profesional');
            $table->string('razon_social_emp_inst');
            $table->string('denominacion_modulo');
            $table->string('horas_minimo');
            $table->date('inicio_practicas');
            $table->date('fin_practicas');
            $table->string('descripcion');
            $table->string('firma_jefe_area');
            $table->string('firma_docente_evaluador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_resumen_practicas_preprofesionales', function (Blueprint $table) {
            //
        });
    }
};
