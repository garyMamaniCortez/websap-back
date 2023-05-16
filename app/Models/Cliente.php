<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_cliente',
        'codigo_sis',
        'email',
        'matricula',
        'celular'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
