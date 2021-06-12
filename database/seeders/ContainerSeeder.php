<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 245) as $index) {
            DB::table('containers')->insert([
                'name' => 'Container ' . $index,
                'number_plate' => 'AB-121-A' . $index,
                'country_id' => $index,
                'is_available' => 'true'
            ]);
        }
    }
}
