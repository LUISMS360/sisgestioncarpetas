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
        Schema::create('futs', function (Blueprint $table) {
            $table->id();
            $table->string('resumen_solicitud');
            $table->string('dirigida');
            $table->string('datos_del_solicitante');
            $table->string('nombres_apellidos');            
            $table->string('documento_identidad');            
            $table->string('razon_social');
            $table->string('ruc');
            $table->string('telefonos');
            $table->string('correo');
            $table->string('domicilio');
            $table->string('cargo_actual');
            $table->string('carrera_profesional');
            $table->string('anio_egresado');
            $table->text('fundamentacion_pedido');
            $table->string('documentos_adjuntados');
            $table->string('fecha');
            $table->string('lugar');
            $table->string('firma');
            $table->foreignId('estudiante_id')->constrained('users');
            $table->foreignId('egresado_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('futs');
    }
};
