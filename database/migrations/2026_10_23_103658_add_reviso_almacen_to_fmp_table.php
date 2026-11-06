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
            $table->string('reviso_almacen')->nullable()->after('reviso_produccion');
            $table->string('observaciones_almacen')->nullable()->after('observaciones_produccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fmp', function (Blueprint $table) {
            $table->dropColumn(['reviso_almacen', 'observaciones_almacen']);
        });
    }
};
