<?php

namespace App\Exports;

use App\Models\Fmp;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class FmpExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $columnas = ['folio', 'fecha', 'hora_recepcion'];
        return Fmp::select($columnas)->get();
    }

    //metodo para ponerle titulo a la hoja de excel, al parecer desde aqui se av a configurar esa cosa :p
    public function  title():string
    {
        return 'Lista de Formatos de materia prima';
    }

    // public function map($row): array
    // {
    //     return [
    //         ''
    //     ];
    // }

}
