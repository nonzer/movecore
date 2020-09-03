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
                'price' => 6500,
                'price_buy' => 6100,
                'qty_stock' => 15
            ],
            [
                'name' => 'Tradex',
                'weight' => 21.4,
                'price' => 6500,
                'price_buy' => 6100,
                'qty_stock' => 15
            ]
        ]);
    }
}
