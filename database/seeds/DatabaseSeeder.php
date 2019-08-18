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
        // ItemsTableSeederを読み込むように指定
        $this->call(ItemsTableSeeder::class);
        // ShopsTableSeederを読み込むように指定
        $this->call(ShopsTableSeeder::class);
    }
}
