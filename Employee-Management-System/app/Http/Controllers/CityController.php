<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('Cities.index', ['cities' => $cities]);
    }

    public function create()
    {
        return view('Cities.create');
    }

    public function store(Request $request)
    {
        $city = new City;
        $this->validate($request, [
            'name' => 'required|max:60|unique:cities'
        ]);
        $city->name = $request->name;
        $city -> save();
        return redirect()->intended('/cities')->with('success','City Added Successfully!');
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('Cities.edit', ['city' => $city]);
    }

    public function update($id, Request $request)
    {
        $city = City::find($id);
        $this->validate($request, [
            'name' => 'required|max:60|unique:cities'
        ]);
        $city->name = $request->name;
        $city->save();
        return redirect()->intended('/cities')->with('success','City Updated Successfully!');
    }

    public function delete($id)
    {
        City::find($id) -> delete();
        return redirect()->intended('/cities')->with('success','City Deleted Successfully!');
    }

    public function search(Request $request)
    {
        $name = $request->cityname;
        $id = DB::table('cities') -> where('name', '=', $name) -> value('id');

        //dd($id);
        $results = DB::table('employees')
        ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('countries', 'employees.country_id', '=', 'countries.id')
        ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.id')
        ->select('employees.*', 'departments.name as department_name', 'departments.id as department_id', 'divisions.name as division_name', 'divisions.id as division_id', 'cities.name as city_name')
        ->where('city_id', '=', $id)
        ->paginate(5);

        return view('Cities.results', compact('results'));
    }
}
