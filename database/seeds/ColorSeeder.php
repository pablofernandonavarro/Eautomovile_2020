<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'color_name'  => 'Sin Datos'
        ]);
        DB::table('colors')->insert([
            'color_name'  => 'Rojo'
        ]);
        DB::table('colors')->insert([
            'color_name'  => 'Azul',
        ]);
        DB::table('colors')->insert([
            'color_name'  => 'Beige claro',
        ]);
        DB::table('colors')->insert([
            'color_name'  => 'Beige oscuro',
        ]);
        DB::table('colors')->insert([
            'color_name'  => 'Negro',
        ]);
        DB::table('colors')->insert([
            'color_name'  => 'Gris',
        ]);
       
       
       
       
    }
}