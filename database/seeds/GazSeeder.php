<?php

use Illuminate\Database\Seeder;

class GazSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Gaz::insert([
            [
                'name' => 'Total',
                'weight' => 12.5,
                'price' => 3500
            ],
            [
                'name' => 'Tradex',
                'weight' => 21.4,
                'price' => 6500
            ]
        ]);
    }
}
