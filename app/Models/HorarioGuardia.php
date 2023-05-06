<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioGuardia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'hora_ini',
        'hora_fin',
        'dias'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
