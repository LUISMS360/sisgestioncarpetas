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
        Schema::table('table_criterios_evaluacion_cualitativa', function (Blueprint $table) {
            $table->integer('c_uno');
            $table->integer('c_dos');
            $table->integer('c_tres');
            $table->integer('c_cuatro');
            $table->integer('c_cinco');
            $table->integer('c_seis');
            $table->integer('c_siete');
            $table->integer('c_ocho');
            $table->integer('c_nueve');
            $table->integer('c_diez');
            $table->integer('c_once');
            $table->integer('c_doce');
            $table->integer('c_trece');
            $table->integer('c_catorce');
            $table->integer('c_diecisies');
            $table->integer('c_diecisiete');
            $table->integer('c_dieciocho');
            $table->integer('c_diecinueve');
            $table->integer('c_veinte');
            $table->string('semantica');
            $table->string('numerico');
            $table->string('literal');
            $table->string('firma_empresa');
            $table->string('sello_empresa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_criterios_evaluacion_cualitativa', function (Blueprint $table) {
            //
        });
    }
};
