<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([

            'id' => '1',
            'name' => 'IT'
        ]);

        DB::table('departments')->insert([

            'id' => '2',
            'name' => 'HR'
        ]);

        DB::table('departments')->insert([

            'id' => '3',
            'name' => 'Management'
        ]);
    }
}
