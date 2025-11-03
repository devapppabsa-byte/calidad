<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fmp extends Model
{
    use HasFactory;


    protected $table ="fmp";
    protected $fillable =[
        'folio_p1',
        'folio_p2',
        'folio_p3',
        'planta',
        'folio',
        'fecha',
        'hora_recepcion',
        'producto',
        'proveedor',
        'lote',
        'linea_transportista',
        'nombre_operador',
        'placas_trasnporte',
        'placas_caja',
        'hora_entrada_lab',
        'hora_liberacion',
        'humedad',
        'temperatura',
        'peso_especifico',
        'grano_maltratado',
        'grano_quebrado',
        'impurezas',
        'cantidad_muestra',
        'bx',
        'plagas',
        'certificado_calidad',
        'fluorecencia',
        'asegurado',
        'color_olor_caracteristico',
        'equipo_muestreo',
        'materia_impropio',
        'dwg',
        'm10',
        'm16',
        'm18',
        'f',
        'metodo_muestreo',
        'aceptado_concesion',
        'superviso_muestreo',
        'usuario_logeado',
        'dictamen_final',
        'observaciones_realizador',
        'observaciones_bascula',
        'observaciones_produccion',
        'reviso_bascula',
        'reviso_produccion',
        'unidad_medida',
        'caducidad', 
        'fleje',
        'cantidad_recepcionada'


    ];
}
