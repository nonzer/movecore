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
                'slug' => 'BPD',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-5')->first()->id
            ],
            [
                'name' => 'Bonamoussadi',
                'slug' => 'BSD',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-5')->first()->id
            ],
            [
                'name' => 'New-bell',
                'slug' => 'NBL',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-2')->first()->id
            ],
            [
                'name' => 'Bonapriso',
                'slug' => 'BPS',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-2')->first()->id
            ],
            [
                'name' => 'Ndogpassi-1',
                'slug' => 'NP1',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-3')->first()->id
            ],
            [
                'name' => 'Ndogpassi-2',
                'slug' => 'NP2',
                'arrondissements_id' => \App\Arrondissement::where('slug', 'DLA-3')->first()->id
            ]
        ]);
    }
}
