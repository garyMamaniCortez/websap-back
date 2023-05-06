<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_cliente',
        'fecha_ini',
        'fecha_fin',
        'codigo_sis',
        'email',
        'matricula',
        'celular',
        'sitio'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
