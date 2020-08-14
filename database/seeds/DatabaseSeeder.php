<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         
         $this->call(BrandSeeder::class);
         $this->call(PatternSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(ColorSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(NoteSeeder::class);
        
    }
}
