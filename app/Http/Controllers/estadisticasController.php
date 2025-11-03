<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class estadisticasController extends Controller
{
    public function proveedores(){

        
        $proveedores = DB::select("SELECT proveedor, COUNT(*) AS repeticiones FROM fmp GROUP BY proveedor ORDER BY repeticiones DESC LIMIT 10 ");

        $rechazados = DB::select("SELECT proveedor, COUNT(*) AS repeticiones FROM fmp WHERE dictamen_final LIKE 'RECHAZADO' GROUP BY proveedor ORDER BY repeticiones DESC LIMIT 10 ");

        
 

        return view('estadisticas.proveedores', compact('proveedores', 'rechazados'));
    }
}
