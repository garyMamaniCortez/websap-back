<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    use HasFactory;
    protected $fillable = [
        'sitio',
        'ocupado'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
