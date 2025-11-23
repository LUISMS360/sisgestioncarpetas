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
        Schema::table('table_hoja_aceptacion_practicas_preprofesionales', function (Blueprint $table) {
            $table->date('fecha')->nullable();
            $table->string('razon_social_empresa');
            $table->text('direccion');
            $table->string('pais');
            $table->string('ciudad');
            $table->string('lugar');
            $table->string('telefono',9);
            $table->string('encargado_control_practicas');
            $table->string('vacantes_otorgadas');
            $table->string('nro_practica')->nullable();            
            $table->string('carrera_profesional');            
            $table->date('periodo_inicial');            
            $table->date('periodo_final');            
            $table->string('horario')->nullable();            
            $table->string('observaciones')->nullable();            
            $table->boolean('pago_por_practicas');
            $table->boolean('movilidad');
            $table->boolean('otros');
            $table->boolean('solo_practicas');
            $table->boolean('compromiso_con_empresa');
            $table->boolean('compromiso_seguro');
            $table->string('firma_encargado')->nullable();
            $table->string('firma_empresa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_hoja_aceptacion_practicas_preprofesionales', function (Blueprint $table) {
            //
        });
    }
};
