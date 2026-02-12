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
            $table->enum('modulo',['I', 'II','III'])->nullable();
            $table->string('nota')->nullable();
            $table->string('nota_letra')->nullable();
            $table->string('lugar')->nullable();
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
