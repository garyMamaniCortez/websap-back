<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente',
        'fecha_ini',
        'fecha_fin',
        'sitio'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
