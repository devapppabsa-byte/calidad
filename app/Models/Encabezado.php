<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encabezado extends Model
{
    protected $fillable = ['formato', 'nombre', 'codigo', 'version', 'vigencia'];

    protected static $defaults = [
        'fmp' => [
            'formato' => 'fmp',
            'nombre' => 'RECEPCIÓN DE MATERIA PRIMA Y MATERIAL DE EMPAQUE',
            'codigo' => 'FO/GP/CC/070/01',
            'version' => '03',
            'vigencia' => 'AGOSTO 2023',
        ],
        'fpnc' => [
            'formato' => 'fpnc',
            'nombre' => 'NOTIFICACIÓN DE PRODUCTO NO CONFORME',
            'codigo' => 'FO/GP/CC/001/001',
            'version' => '03',
            'vigencia' => 'FEBRERO 2026',
        ],
        'fvu' => [
            'formato' => 'fvu',
            'nombre' => 'VERIFICACIÓN DE UNIDADES',
            'codigo' => 'FO/GP/CC/070/05',
            'version' => '03',
            'vigencia' => 'AGOSTO 2023',
        ],
    ];

    public static function de($formato)
    {
        $registro = static::firstWhere('formato', $formato);

        if ($registro) {
            return $registro;
        }

        return (object) (static::$defaults[$formato] ?? [
            'formato' => $formato,
            'nombre' => '',
            'codigo' => '',
            'version' => '',
            'vigencia' => '',
        ]);
    }
}
