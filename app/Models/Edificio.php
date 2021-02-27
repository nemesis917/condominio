<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    use HasFactory;

    protected $table = "edificio";

    protected $fillable = [
        'codigo_edificio ',
        'nombre_edificio',
        'codigo_gerente',
        'honorarios_edif',
        'ubicacion',
        'direccion',
        'codigo_postal',
        'porc_fondo_reserva',
        'iva',
        'porc_intereces_mor',
        'porc_comision_cheque_devuelto',
        'comentario'
    ];

    public function empresa()
    {
        return $this->belongsToMany('App\Models\Empresa')->withTimestamps();
    }
}
