<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Employee;
use App\Country;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

            $employeeCount = DB::table('employees')->count();
            $departments = DB::table('departments')->count();
            $countries = DB::table('countries')->count();

        return view('dashboard', ['employeeCount' => $employeeCount, 'countries'
        => $countries, 'departments' => $departments]);
    }
}
