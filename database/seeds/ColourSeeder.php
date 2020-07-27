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
        DB::table('brands')->insert([
            'brand_name'  => 'Volkswagen'
        ]);
        DB::table('brands')->insert([
            'brand_name'  => 'Chevrolet'
        ]);
        DB::table('brands')->insert([
            'brand_name'  => 'Toyota',
        ]);
        DB::table('brands')->insert([
            'brand_name'  => 'Hyundai',
        ]);
        DB::table('brands')->insert([
            'brand_name'  => 'Mercedes-Benz',
        ]);
        DB::table('brands')->insert([
            'brand_name'  => 'Ford',
        ]);
    }
}
