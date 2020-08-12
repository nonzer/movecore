<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::insert([
           [
               'name' => '1 mois',
               'period' => 1,
               'description' => 'date d\'expiration gaz du client est de 1 mois'
           ],
            [
                'name' => '2 mois',
                'period' => 2,
                'description' => 'date d\'expiration gaz du client est de 2 mois'
            ],
            [
                'name' => '3 mois',
                'period' => 3,
                'description' => 'date d\'expiration gaz du client est de 3 mois'
            ],
            [
                'name' => '4 mois',
                'period' => 4,
                'description' => 'date d\'expiration gaz du client est de 4 mois'
            ]
        ]);
    }
}
