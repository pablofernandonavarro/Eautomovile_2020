<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name'  => 'Sin Datos'
        ]);
        DB::table('categories')->insert([
            'category_name'  => 'Cubre alfombra de Baul'
        ]);
        DB::table('categories')->insert([
            'category_name'  => 'Cubre alfombra de caja Camioneta',
        ]);
        DB::table('categories')->insert([
            'category_name'  => 'Cubre alfombra de Habitaculo',
        ]);
        
    }
}
