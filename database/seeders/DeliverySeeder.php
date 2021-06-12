<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 100) as $index) {
            DB::table('deliveries')->insert([
                'sender' => 'Sender ' . $index,
                'sender_country' => rand(1, 245),
                'sender_address' => 'Sender Address ' . $index,
                'receiver' => 'Receiver ' . $index,
                'receiver_country' => rand(1, 245),
                'receiver_address' => 'Receiver Address ' . $index,
                'container_id' => rand(1, 100),
                'port' => rand(1, 245),
                'to_port' => rand(1, 245),
                'cargo_ship_id' => rand(1, 100),
                'ppn' => random_int(1000000, 10000000),
                'total' => random_int(10000000, 1000000000),
                'status' => 'Sampai tujuan'
            ]);
        }
    }
}
