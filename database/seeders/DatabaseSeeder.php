<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nombres' => 'Gary',
                'apellidos' => 'Mamani',
                'email'=> 'gary.mamani@gmail.com',
                'ci' => 8852586,
                'celular' => 65385951,
                'contraseña' => '12345678',
                'tipo_usuario' => 'admin'
            ],
            [
                'nombres' => 'Luis',
                'apellidos' => 'Rosales',
                'email'=> 'rosales.luis@gmail.com',
                'ci' => 8852587,
                'celular' => 65385952,
                'contraseña' => '12345678',
                'tipo_usuario' => 'guardia'
            ]
        ]);
        DB::table('sitios')->insert([
            [
                'sitio' => 'A21',
                'ocupado' => 1
            ],
            [
                'sitio' => 'A22',
                'ocupado' => 0
            ]
        ]);
        DB::table('clientes')->insert([
            [
                'nombre_cliente' => 'Joselito',
                'codigo_sis' => 201900402,
                'email' => 'gary.mamani@gmail.com',
                'matricula' => '1234ABC',
                'celular' => 65385951,
            ]
        ]);
        DB::table('reservas')->insert([
            [
                'cliente' => 1,
                'fecha_ini' => now(),
                'sitio' => 1
            ]
        ]);
        DB::table('registro_pagos')->insert([
            [
                'id_reserva' => 1,
                'monto' => 2,
                'fecha_pago' => now(),
                'id_usuario' => 1
            ]
        ]);
    }
}
