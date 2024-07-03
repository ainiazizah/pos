<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['name' => 'John Doe', 'email' => 'johndoe@example.com', 'password' => bcrypt('password123')],
            ['name' => 'Bob Smith', 'email' => 'bobsmith@example.com', 'password' => bcrypt('password123')],
        ]);

    }
}
