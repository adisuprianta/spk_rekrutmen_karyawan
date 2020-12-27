<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
              'email' => 'admin@gmail.com',
              'password' => bcrypt('admin'),
              'created_at' => (new datetime()),
              'updated_at' => (new datetime())
            ],
            [
                'name' => 'Admin1',
              'email' => 'admin1@gmail.com',
              'password' => bcrypt('admin'),
              'created_at' => (new datetime()),
              'updated_at' => (new datetime())
            ]
        ]);
    }
}
