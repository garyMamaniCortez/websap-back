<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPagos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_reserva',
        'monto',
        'fecha_pago',
        'id_usuario',
        'id_registro_parqueo'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
