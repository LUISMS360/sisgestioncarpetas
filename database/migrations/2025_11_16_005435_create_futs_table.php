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
            $table->string('dirigida')->nullable();
            $table->string('datos_del_solicitante');
            $table->string('nombres_apellidos');            
            $table->string('documento_identidad');            
            $table->string('razon_social')->nullable();
            $table->string('ruc')->nullable();
            $table->string('telefonos');
            $table->string('correo');
            $table->string('domicilio');
            $table->string('cargo_actual');
            $table->string('carrera_profesional');
            $table->string('anio_egresado')->nullable();
            $table->text('fundamentacion_pedido');
            $table->string('documentos_adjuntados');
            $table->string('fecha')->nullable();
            $table->string('lugar')->nullable();
            $table->string('firma')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('turno',['mañana','noche'])->nullable();
            $table->enum('ciclo',['I','II','III','IV','V','VI'])->nullable();
            $table->enum('estado',['recibido','revisado','completo'])->default('recibido');
            $table->enum('modulo',['I','II','III'])->nullable();
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
