<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ArrondissementSeeder::class);
        $this->call(QuarterSeeder::class);
        $this->call(GazSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
