<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([

            'id' => '1',
            'firstname' => 'Ahmed',
            'middlename' => 'Tarek',
            'lastname' => 'Sayyed',
            'country_id' => '1',
            'city_id' => '1',
            'zip' => '11111',
            'birthdate' => '1985-7-25',
            'date_joined' => '2007-6-12',
            'department_id'=> '1',
            'division_id'=> '1',
            'picture' => '...........'
        ]);


        DB::table('employees')->insert([

            'id' => '2',
            'firstname' => 'Waleed',
            'middlename' => 'Fahmy',
            'lastname' => 'Gamal',
            'country_id' => '2',
            'city_id' => '2',
            'zip' => '46546',
            'birthdate' => '1992-7-3',
            'date_joined' => '2010-2-14',
            'department_id'=> '3',
            'division_id'=> '1',
            'picture' => '........'
        ]);

        DB::table('employees')->insert([

            'id' => '3',
            'firstname' => 'Hesham',
            'middlename' => 'Atef',
            'lastname' => 'Ahmed',
            'country_id' => '1',
            'city_id' => '1',
            'zip' => '15311',
            'birthdate' => '1999-10-22',
            'date_joined' => '2015-9-1',
            'department_id'=> '2',
            'division_id'=> '3',
            'picture' => '........'
        ]);
    }
}
