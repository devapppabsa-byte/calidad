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
        Schema::create('encabezados', function (Blueprint $table) {
            $table->id();
            $table->string('formato', 20)->unique();
            $table->string('nombre', 150);
            $table->string('codigo', 60);
            $table->string('version', 20);
            $table->string('vigencia', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encabezados');
    }
};
