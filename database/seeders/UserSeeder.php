<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => "Hafidz",
            'email' => 'hafidz@gmail.com',
            'roles' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => "farhan",
            'email' => 'farhan@gmail.com',
            'roles' => 'asisten',
            'password' => Hash::make('password123'),
        ]);

        
    }
}
