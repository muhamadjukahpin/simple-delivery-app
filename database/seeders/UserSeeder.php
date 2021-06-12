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
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234'),
                'level' => 'admin'
            ],
            [
                'name' => 'Operator Pelabuhan',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('1234'),
                'level' => 'operator'
            ]
        ]);
    }
}
