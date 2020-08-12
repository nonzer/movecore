<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Monoue Simon',
            'login' => 'simonStromae',
            'password' => \Illuminate\Support\Facades\Hash::make('root'),
            'tel' => '691274385',
            'roles_id' => \App\Role::where('name', 'Admin')->first()->id
        ]);
    }
}
