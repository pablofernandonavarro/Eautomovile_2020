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
            'pattern_name'  => 'Gol'
        ]);
        DB::table('patterns')->insert([
            'pattern_name'  => 'Corsa'
        ]);
        DB::table('patterns')->insert([
            'pattern_name'  => 'ka',
        ]);
        DB::table('patterns')->insert([
            'pattern_name'  => 'Megane',
        ]);
       
    }
}
