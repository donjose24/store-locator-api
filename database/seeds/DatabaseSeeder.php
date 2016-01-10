<?php

use Illuminate\Database\Seeder;
use App\Store;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $this->call(ProductTableSeeder::class);
        $this->call(StoreTableSeeder::class);
    }
}
