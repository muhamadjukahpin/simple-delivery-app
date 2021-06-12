<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 245) as $index) {
            DB::table('ports')->insert([
                'name' => 'Pelabuhan ' . $index,
                'country_id' => $index,
                'address' => 'Address ' . $index
            ]);
        }
    }
}
