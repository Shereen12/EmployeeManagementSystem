<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;


class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('Countries.index', ['countries' => $countries]);
    }

    public function create()
    {
        return view('Countries.create');
    }

    public function store(Request $request)
    {
        $country = new Country;
        $this->validate($request, [
            'name' => 'required|max:60|unique:countries',
        ]);
        $country->name = $request->name;
        $country -> save();
        return redirect()->intended('/countries')->with('success','Country Added Successfully!');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('Countries.edit', ['country' => $country]);
    }

    public function update($id, Request $request)
    {
        $country = Country::find($id);
        $this->validate($request, [
            'name' => 'required|max:60|unique:countries',
        ]);
        $country->name = $request->name;
        $country->save();
        return redirect()->intended('/countries')->with('success','Department Updated Successfully!');
    }

    public function delete($id)
    {
        Country::find($id) -> delete();
        return redirect()->intended('/countries')->with('success','Department Deleted Successfully!');
    }

    public function search(Request $request)
    {
        $name = $request->countryname;
        $id = DB::table('countries') -> where('name', '=', $name) -> value('id');

        //dd($id);
        $results = DB::table('employees')
        ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('countries', 'employees.country_id', '=', 'countries.id')
        ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.id')
        ->select('employees.*', 'departments.name as department_name', 'departments.id as department_id', 'divisions.name as division_name', 'divisions.id as division_id', 'countries.name as country_name')
        ->where('country_id', '=', $id)
        ->paginate(5);

        return view('Countries.results', compact('results'));
    }
}
