<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_ini',
        'fecha_fin',
        'tarifa'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
