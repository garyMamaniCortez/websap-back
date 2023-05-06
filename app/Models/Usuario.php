<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'ci',
        'celular',
        'contraseña',
        'tipo_usuario'
    ];

    protected $hidden = [
        'contraseña',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
