<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class usersExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return [
            'id',
            'nombre',
            'apellido',
            'correo'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return User::select('id', 'name', 'lastname', 'email')->get();
        //return collect(User::exportExcelUsers());
    }
}
