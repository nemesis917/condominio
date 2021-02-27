<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresa";

    protected $fillable = [
        'empresa',
        'users_id'
    ];

    public function edificios()
    {
        return $this->belongsToMany('App\Models\Edificio')->withTimestamps();
    }


}
