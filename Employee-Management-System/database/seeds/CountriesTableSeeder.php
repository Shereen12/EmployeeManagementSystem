<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([

            'id' => '1',
            'name' => 'Egypt'
        ]);

        DB::table('countries')->insert([

            'id' => '2',
            'name' => 'UK'
        ]);

        DB::table('countries')->insert([

            'id' => '3',
            'name' => 'France'
        ]);
    }
}
