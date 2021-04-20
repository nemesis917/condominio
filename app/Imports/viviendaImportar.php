<?php

namespace App\Imports;

use App\Models\Vivienda;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class viviendaImportar implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        return new Vivienda([
            'correo'                => $row['correo2'],
            'num_inmueble'          => $row['numero_de_inmueble3'],
            'nombre'                => $row['nombre0'],
            'apellido'              => $row['apellido1'],
            'estado_inmueble'       => $row['estado_del_inmueble4'],
            'alicuota'              => $row['alicuota5'],
            'gastos_administracion' => $row['gastos_administrativos6'],
            'edificio_id'           => $row['id_del_edificio9'],
            'telefono_oficina'      => $row['telefono_movil8'],
            'telefono_habitacion'   => $row['telefono_habitacion7']           
        ]);
    }
}
