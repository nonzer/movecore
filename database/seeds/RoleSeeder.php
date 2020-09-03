<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::insert([
            [
                'name' => 'Admin',
                'description' => 'Gestionnaire du système'
            ],
            [
                'name' => 'CEO',
                'description' => 'Manager'
            ],
            [
                'name' => 'Chef_unite',
                'description' => 'Gestionnaire des entrées / sorties des commandes et des clients'
            ],
            [
                'name' => 'GRC',
                'description' => 'Gestionnaire Relation Client'
            ],
            [
                'name' => 'Livreur',
                'description' => 'Personne  chargée d\'acheminer les colis aux clients'
            ],
        ]);
    }
}
