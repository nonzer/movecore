<?php

use Illuminate\Database\Seeder;

class ArrondissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Arrondissement::insert([
            [
               'name' => 'Douala 1er',
               'slug' => 'DLA-1',
               'cities_id' => \App\City::where('name', 'Douala')->first()->id
            ],
            [
                'name' => 'Douala 2ème',
                'slug' => 'DLA-2',
                'cities_id' => \App\City::where('name', 'Douala')->first()->id
            ],
            [
                'name' => 'Douala 3ème',
                'slug' => 'DLA-3',
                'cities_id' => \App\City::where('name', 'Douala')->first()->id
            ],
            [
                'name' => 'Douala 4ème',
                'slug' => 'DLA-4',
                'cities_id' => \App\City::where('name', 'Douala')->first()->id
            ],
            [
                'name' => 'Douala 5ème',
                'slug' => 'DLA-5',
                'cities_id' => \App\City::where('name', 'Douala')->first()->id
            ],
            [
                'name' => 'Yaoundé 1er',
                'slug' => 'YDE-1',
                'cities_id' => \App\City::where('name', 'Yaoundé')->first()->id
            ]
        ]);
    }
}
