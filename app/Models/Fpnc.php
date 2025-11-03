<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fpnc extends Model
{
    use HasFactory;

    protected $table = 'fpnc'; 
    protected $fillable = [
        'fecha', 
        'folio', 
        'folio_fmp', 
        'materia', 
        'proveedor', 
        'producto', 
        'presentacion', 
        'lote',
        'cantidad',
        'desviacion',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'foto6',
        'observaciones',
        'via_notificacion',
        'recibe_notificacion',
        'emite_notificacion',
        'usuario_logeado' ];

}
