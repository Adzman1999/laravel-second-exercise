<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'first_name' => 'Mhan',
            'middle_name' => 'I',
            'last_name' => 'Abdulsamad',
            'username' => 'Admin',
            'password' => bcrypt('password')
        ]);
    }
}
