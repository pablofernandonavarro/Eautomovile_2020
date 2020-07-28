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
            'category_name'  => 'Habitaculo'
        ]);
        DB::table('categories')->insert([
            'category_name'  => 'Baul'
        ]);
        DB::table('categories')->insert([
            'category_name'  => 'Caja',
        ]);
        
    }
}
