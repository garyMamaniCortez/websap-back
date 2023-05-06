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
        DB::table('reservas')->insert([
            [
                'nombre_cliente' => 'Joselito',
                'fecha_ini' => now(),
                'codigo_sis' => 201900402,
                'email' => 'gary.mamani@gmail.com',
                'matricula' => '1234ABC',
                'celular' => 65385951,
                'sitio' => 1
            ]
        ]);
    }
}
