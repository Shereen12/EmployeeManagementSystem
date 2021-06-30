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
        $this->call(CitiesTableSeeder::class, CountriesTableSeeder::class,
                    DepartmentsTableSeeder::class, DivisionsTableSeeder::class,
                    EmployeesTableSeeder::class);
    }
}