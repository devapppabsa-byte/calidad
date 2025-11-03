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
        Schema::table('fmp', function (Blueprint $table) {
            $table->string('fleje')->nullable();
            $table->string('caducidad')->nullable();
            $table->string('cantidad_recepcionada')->nullable();
            $table->string('unidad_medida')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fmp', function (Blueprint $table) {
            //
        });
    }
};
