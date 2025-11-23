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
        Schema::table('memorandus', function (Blueprint $table) {
            $table->foreignId('admin_id')->constrained('users');
            $table->foreignId('profesor_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memorandus', function (Blueprint $table) {
            //
        });
    }
};
