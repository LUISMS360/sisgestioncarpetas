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
        Schema::table('futs', function (Blueprint $table) {
            $table->string('dirigida')->nullable(); //AGREGUE ESTO -- SOY CHRIS
            $table->enum('turno',['dia','noche'])->nullable();
            $table->enum('ciclo',['I','II','III','IV','V','VI'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('futs', function (Blueprint $table) {
            //
        });
    }
};
