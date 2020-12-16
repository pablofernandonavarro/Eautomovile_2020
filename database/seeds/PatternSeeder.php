<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patterns')->insert([
            'pattern_name'  => 'Sin Datos',
            'brand_id'      => '1'
        ]);
        DB::table('patterns')->insert([
            'pattern_name'  => 'Corsa',
            'brand_id'      => '2'
        ]);
        DB::table('patterns')->insert([
            'pattern_name'  => 'ka',
            'brand_id'      => '6'
        ]);
        DB::table('patterns')->insert([
            'pattern_name'  => 'Megane',
            'brand_id'      => '5'
        ]);
       
    }
}
