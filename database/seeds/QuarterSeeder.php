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
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-5')->first()->id
            ],
            [
                'name' => 'Bonamoussadi',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-5')->first()->id
            ],
            [
                'name' => 'New-bell',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-2')->first()->id
            ],
            [
                'name' => 'Bonapriso',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-2')->first()->id
            ],
            [
                'name' => 'Ndogpassi-3',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-3')->first()->id
            ],
            [
                'name' => 'Ndogpassi-2',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-3')->first()->id
            ]
        ]);
    }
}
