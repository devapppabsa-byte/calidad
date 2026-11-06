<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Encabezado;

class EncabezadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Encabezado::updateOrCreate(['formato' => 'fmp'], [
            'nombre' => 'RECEPCIÓN DE MATERIA PRIMA Y MATERIAL DE EMPAQUE',
            'codigo' => 'FO/GP/CC/070/01',
            'version' => '03',
            'vigencia' => 'AGOSTO 2023',
        ]);

        Encabezado::updateOrCreate(['formato' => 'fpnc'], [
            'nombre' => 'NOTIFICACIÓN DE PRODUCTO NO CONFORME',
            'codigo' => 'FO/GP/CC/001/001',
            'version' => '03',
            'vigencia' => 'FEBRERO 2026',
        ]);

        Encabezado::updateOrCreate(['formato' => 'fvu'], [
            'nombre' => 'VERIFICACIÓN DE UNIDADES',
            'codigo' => 'FO/GP/CC/070/05',
            'version' => '03',
            'vigencia' => 'AGOSTO 2023',
        ]);
    }
}
