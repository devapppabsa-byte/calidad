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
        Schema::create('fpnc', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->string('planta');
            $table->string('fecha');
            $table->string('folio_fmp');  //Va ligado al folio del formato de materia prima
            $table->string('materia');
            $table->string('proveedor');
            $table->string('producto');
            $table->string('presentacion');
            $table->string('lote');
            $table->string('cantidad'); 
            $table->string('desviacion');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('via_notificacion');
            $table->string('otra_notificacion')->nullable();
            $table->string('recibe_notificacion');
            $table->string('emite_notificacion');
            $table->string('usuario_logeado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fpnc');
    }
};
