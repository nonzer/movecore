<?php

use Illuminate\Database\Seeder;

class QuarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Quarter::insert([
            [
                'name' => 'Bepanda',
                'slug' => 'BEP',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-5')->first()->id
            ],
            [
                'name' => 'Bonamoussadi',
                'slug' => 'SADI',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-5')->first()->id
            ],
            [
                'name' => 'New-bell',
                'slug' => 'NB',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-2')->first()->id
            ],
            [
                'name' => 'Bonapriso',
                'slug' => 'PRISO',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-2')->first()->id
            ],
            [
                'name' => 'Ndogpassi-3',
                'slug' => 'NDG3',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-3')->first()->id
            ],
            [
                'name' => 'Ndogpassi-2',
                'slug' => 'NDG2',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-3')->first()->id
            ]
        ]);
    }
}
