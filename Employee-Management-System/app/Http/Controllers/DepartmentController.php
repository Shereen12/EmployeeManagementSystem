<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return view('Departments.index', ['departments' => $departments]);

    }

    public function delete($id)
    {
        Department::find($id) -> delete();
        return redirect()->intended('/departments')->with('success','Department Deleted Successfully!');
    }


    public function create()
    {
        return view('Departments.create');
    }

    public function store(Request $request)
    {
        $department = new Department;
        $this->validate($request, [
            'name' => 'required|max:60|unique:departments'
        ]);

        $department -> name = $request -> name;

        $department -> save();

        return redirect()->intended('/departments')->with('success','Department Added Successfully!');

    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('Departments.edit', ['department' => $department]);
    }

    public function update($id, Request $request)
    {
        $department = Department::find($id);
        $this->validate($request, [
            'name' => 'required|max:60|unique:departments'
        ]);
        $department -> name = $request -> name;
        $department -> save();
        return redirect()->intended('/departments')->with('success','Department Updated Successfully!');
    }

    public function search(Request $request)
    {
        $name = $request->departmentname;
        $id = DB::table('departments') -> where('name', '=', $name) -> value('id');

        //dd($id);
        $results = DB::table('employees')
        ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('countries', 'employees.country_id', '=', 'countries.id')
        ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.id')
        ->select('employees.*', 'departments.name as department_name', 'departments.id as department_id', 'divisions.name as division_name', 'divisions.id as division_id')
        ->where('department_id', '=', $id)
        ->paginate(5);

        return view('Departments.results', compact('results'));
    }
}
