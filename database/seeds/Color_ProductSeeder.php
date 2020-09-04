<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Color_ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<30; $i++) {
            DB::table('color_product')->insert([
                  'color_id' => mt_rand(1,4),
                  'product_id' => mt_rand(1,30),
                  ]);//
          }
    }
}
