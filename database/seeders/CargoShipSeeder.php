<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 245) as $index) {
            DB::table('cargo_ships')->insert([
                'name' => 'Cargo ship ' . $index,
                'port_id' => $index,
                'status' => 'not sailing',
                'is_available' => 'true'
            ]);
        }
    }
}
