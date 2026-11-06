<?php

namespace App\Http\Controllers;

use App\Models\Encabezado;
use Illuminate\Http\Request;

class encabezadosController extends Controller
{
    public function inicio()
    {
        $encabezados = [
            'fmp' => Encabezado::firstWhere('formato', 'fmp'),
            'fpnc' => Encabezado::firstWhere('formato', 'fpnc'),
            'fvu' => Encabezado::firstWhere('formato', 'fvu'),
        ];

        return view('admin.editar_encabezados', compact('encabezados'));
    }

    public function update(Request $request, $formato)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'codigo' => 'required|string|max:60',
            'version' => 'required|string|max:20',
            'vigencia' => 'required|string|max:60',
        ]);

        $encabezado = Encabezado::firstWhere('formato', $formato);

        if (!$encabezado) {
            return redirect()->back()->with('error', 'Formato no válido.');
        }

        $encabezado->update($request->only(['nombre', 'codigo', 'version', 'vigencia']));

        return redirect()->back()->with('success', 'Encabezado de ' . strtoupper($formato) . ' actualizado correctamente.');
    }
}
