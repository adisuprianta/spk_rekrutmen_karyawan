<?php

use Database\Seeders\BagianSeeder;
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
        // $this->call(UsersTableSeeder::class);
        $this->call(BagianSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Kriteria_ahpSeeder::class);
        $this->call(Sub_Kriteria_ahpSeeder::class);
    }
}
