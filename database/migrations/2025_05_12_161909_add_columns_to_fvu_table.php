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
        Schema::table('fvu', function (Blueprint $table) {
            $table->string('propietario2')->nullable()->after('propietario');
            $table->string('numero_embarque2')->nullable()->after('numero_embarque');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fvu', function (Blueprint $table) {
            //
        });
    }
};
