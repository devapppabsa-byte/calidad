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
        Schema::create('fmp', function (Blueprint $table) {
            $table->id();
            //folios para las tres plantas
            $table->integer('folio_p1')->default(0)->nullable();
            $table->integer('folio_p2')->default(0)->nullable();
            $table->integer('folio_p3')->default(0)->nullable(); 
            //folios para las tres plantas
            //datos que lleva el fomulario del formato
            $table->string('planta');
            $table->string('folio');
            $table->string('fecha');
            $table->string('hora_recepcion');
            $table->string('producto');
            $table->string('proveedor');
            $table->string('lote')->default('pendiente')->nullable();
            $table->string('linea_transportista');
            $table->string('nombre_operador');
            $table->string('placas_transporte');
            $table->string('placas_caja');
            $table->string('hora_entrada_lab');
            $table->string('hora_liberacion');
             //datos que lleva el fomulario del formato

             //mediciones
            $table->string('humedad')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('peso_especifico')->nullable();
            $table->string('grano_maltratado')->nullable();
            $table->string('grano_quebrado')->nullable();
            $table->string('impurezas')->nullable();
            $table->string('cantidad_muestra')->nullable();
            $table->string('bx')->nullable();
            $table->string('plagas')->nullable();
            $table->string('certificado_calidad')->nullable();
            $table->string('fluorecencia')->nullable();
            $table->string('asegurado')->nullable();
            $table->string('color_olor_caracteristico')->nullable();
            $table->string('equipo_muestreo')->nullable();
            $table->string('materia_impropio')->nullable();
            $table->string('dwg')->nullable();
            $table->string('m10')->nullable();
            $table->string('m16')->nullable();
            $table->string('m18')->nullable();
            $table->string('f')->nullable();
             //mediciones

             //datos extras
            $table->string('metodo_muestreo');
            $table->string('aceptado_concesion');
            $table->string('superviso_muestreo');
            $table->string('usuario_logeado');
            $table->string('dictamen_final');
            $table->string('fpnc_lleno')->default('no')->nullable();
            $table->string('observaciones_realizador')->nullable();
             //datos extras

             //Informacion que genera el que revisa el formato
            $table->string('observaciones_bascula')->nullable();
            $table->string('observaciones_produccion')->nullable();
             //Informacion que genera el que revisa el formato
             
             //datos para el manejo de la información
            $table->string('reviso_bascula')->nullable();
            $table->string('reviso_produccion')->nullable();
             //datos para el manejo de la información






            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fmp');
    }
};
