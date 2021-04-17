<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    use HasFactory;

    protected $table = "apartamento";

    protected $fillable = [
        'correo',
        'users_id',
        'num_inmueble',
        'nombre',
        'apellido',
        'estado_inmueble',
        'alicuota',
        'gastos_administracion',
        'telefono_oficina',
        'telefono_habitacion'        
    ];

    protected $appends = ['nombre_completo'];

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function usuario()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

}
