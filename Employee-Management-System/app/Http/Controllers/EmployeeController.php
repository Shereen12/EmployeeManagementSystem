<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\Department;
use App\Division;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')
        ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('countries', 'employees.country_id', '=', 'countries.id')
        ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.id')
        ->select('employees.*', 'departments.name as department_name', 'departments.id as department_id', 'divisions.name as division_name', 'divisions.id as division_id')
        ->paginate(5);

       // echo $employees;
        return view('Employees.index', ['employees' => $employees]);
    }



    public function create()
    {
        $cities = City::all();
        $countries = Country::all();
        $departments = Department::all();
        $divisions = Division::all();


        return view('Employees.create', ['cities' => $cities, 'countries' => $countries,
                  'departments' => $departments, 'divisions' => $divisions]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'birthdate' => 'required',
            'date_join' => 'required',
            'department_id' => 'required',
            'division_id' => 'required',
            'address' => 'required'
        ]);

        $employee = new Employee;

        $employee -> firstname = $request -> firstname;
        $employee -> middlename = $request -> middlename;
        $employee -> lastname = $request -> lastname;
        $employee -> country_id = $request -> country;
        $employee -> city_id = $request -> city;
        $employee -> zip = $request -> zip;
        $employee -> birthdate = $request -> birthdate;
        $employee -> date_joined = $request -> date_join;
        $employee -> department_id = $request -> department_id;
        $employee -> division_id = $request -> division_id;
        $employee -> address = $request -> address;


        $newImageName = time() . '-' . $request-> firstname . '.' . $request -> picture -> extension();

        $request -> picture -> move(public_path('avatars'), $newImageName);



        $employee -> picture = $newImageName;

        $employee -> save();



        return redirect()->intended('/employees')->with('success','Employee Created Successfully!');

    }


    public function edit($id)
    {
        $employee = Employee::find($id);

        $countries = Country::all();

        $departments = Department::all();

        $divisions = Division::all();

        $cities = City::all();

        return view('Employees.edit', ['employee' => $employee,
                    'cities' => $cities, 'countries' => $countries,
                    'departments' => $departments, 'divisions' => $divisions]);
    }

    public function update(Request $request, $id)
    {

        $employee = Employee::find($id);

       $this->validate($request, [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'zip' => 'required',
            'birthdate' => 'required',
            'date_joined' => 'required',
            'department_id' => 'required',
            'division_id' => 'required',
            'address' => 'required'
        ]);

        $employee -> firstname = $request -> firstname;
        $employee -> middlename = $request -> middlename;
        $employee -> lastname = $request -> lastname;
        $employee -> country_id = $request -> country_id;
        $employee -> city_id = $request -> city_id;
        $employee -> zip = $request -> zip;
        $employee -> birthdate = $request -> birthdate;
        $employee -> date_joined = $request -> date_joined;
        $employee -> department_id = $request -> department_id;
        $employee -> division_id = $request -> division_id;
        $employee -> address = $request -> address;


        if ( $request -> picture ){
        $$newImageName = time() . '-' . $request-> firstname . '.' . $request -> picture -> extension();

        $request -> picture -> move(public_path('avatars'), $newImageName);

        $employee -> picture = $newImageName;
        }

        $employee -> save();

        return redirect()->intended('/employees')->with('success','Employee Updated Successfully!');
    }


    public function delete($id)
    {
       Employee::find($id) -> delete();

       return redirect()->intended('/employees')->with('success','Employee Deleted Successfully!');
    }

    public function search(Request $request)
    {
        $first_name = $request -> firstname;
        $middle_name = $request -> middlename;
        $results = DB::table('employees')
        ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('countries', 'employees.country_id', '=', 'countries.id')
        ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.id')
        ->select('employees.*', 'departments.name as department_name', 'departments.id as department_id', 'divisions.name as division_name', 'divisions.id as division_id')
        ->where('firstname', '=', $first_name)
        ->where('middlename', '=', $middle_name)
        ->paginate(5);

        return view('Employees.results', compact('results'));
    }
}
