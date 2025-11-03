<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class encabezadosController extends Controller
{
    public function inicio(){

        return view('admin.editar_encabezados');

    }

}
