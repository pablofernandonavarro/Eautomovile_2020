<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colours')->insert([
            'colour_name'  => 'Negro'
        ]);
        DB::table('colours')->insert([
            'colour_name'  => 'Rojo'
        ]);
        DB::table('colours')->insert([
            'colour_name'  => 'Azul',
        ]);
        DB::table('colours')->insert([
            'colour_name'  => 'Beige',
        ]);
       
    }
}
