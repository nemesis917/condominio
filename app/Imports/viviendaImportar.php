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
        // dd($row);
        return new Vivienda([
            'correo'                => strtolower($row['correo']),
            'num_inmueble'          => strtoupper($row['numero_de_inmueble']),
            'nombre'                => ucfirst($row['nombre']),
            'apellido'              => ucfirst($row['apellido']),
            'estado_inmueble'       => $row['estado_del_inmueble'],
            'alicuota'              => $row['alicuota'],
            'gastos_administracion' => $row['gastos_administrativos'],
            'edificio_id'           => $row['id_del_edificio'],
            'telefono_oficina'      => $row['telefono_movil'],
            'telefono_habitacion'   => $row['telefono_habitacion']           
        ]);
    }
}
