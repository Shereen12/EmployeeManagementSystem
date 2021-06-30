<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([

            'id' => '1',
            'name' => 'First'
        ]);

        DB::table('divisions')->insert([

            'id' => '2',
            'name' => 'Second'
        ]);

        DB::table('divisions')->insert([

            'id' => '3',
            'name' => 'Third'
        ]);
    }
}
