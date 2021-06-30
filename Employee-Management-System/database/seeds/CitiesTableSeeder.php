<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([

            'id' => '1',
            'name' => 'Cairo'
        ]);

        DB::table('cities')->insert([

            'id' => '2',
            'name' => 'London'
        ]);

        DB::table('cities')->insert([

            'id' => '3',
            'name' => 'Paris'
        ]);
    }
}
