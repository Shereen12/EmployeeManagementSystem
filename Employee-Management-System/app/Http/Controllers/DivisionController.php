<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        return view('Divisions.index', ['divisions' => $divisions]);
    }

    public function create()
    {
        return view('Divisions.create');
    }

    public function store(Request $request)
    {
        $division = new Division;
        $division -> name = $request -> name;
        $this->validate($request, [
            'name' => 'required|max:60|unique:divisions'
        ]);
        $division->save();
        return redirect()->intended('/divisions')->with('success','Division Added Successfully!');

    }

    public function delete($id)
    {
        Division::find($id) -> delete();
        return redirect()->intended('/divisions')->with('success','Division Deleted Successfully!');
    }

    public function edit($id)
    {
        $division = Division::find($id);
        return view('Divisions.edit', ['division' => $division]);
    }

    public function update($id, Request $request)
    {
        $division = Division::find($id);

        $this->validate($request, [
            'name' => 'required|max:60|unique:divisions'
        ]);

        $division -> name = $request -> name;

        $division->save();

        return redirect()->intended('/divisions')->with('success','Division Updated Successfully!');
    }

    public function search(Request $request)
    {
        $name = $request->divisionname;
        $id = DB::table('divisions') -> where('name', '=', $name) -> value('id');

        //dd($id);
        $results = DB::table('employees')
        ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('countries', 'employees.country_id', '=', 'countries.id')
        ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.id')
        ->select('employees.*', 'departments.name as department_name', 'departments.id as department_id', 'divisions.name as division_name', 'divisions.id as division_id')
        ->where('division_id', '=', $id)
        ->paginate(5);

        return view('Divisions.results', compact('results'));
    }
}
