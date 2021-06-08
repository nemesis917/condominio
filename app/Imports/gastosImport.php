<?php

namespace App\Imports;

use App\Models\Gasto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class gastosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if ($row['tipo_de_gasto'] == 1) {
            $gasto = "gasto comun"; 
        } else {
            $gasto = "gasto no comun" ;
        }

        return new Gasto([
            'codigo_gastos'         => $row['codigo'],
            'descripcion_gastos'    => $row['descripcion'],
            'estados'               => $gasto
        ]);
    }
}
