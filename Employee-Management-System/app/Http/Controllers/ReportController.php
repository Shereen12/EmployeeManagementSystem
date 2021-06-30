<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Excel;

class ReportController extends Controller
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

        return view('Reports.index', ['employees' => $employees]);
    }

    public function search(Request $request)
    {
           $from = $request->from;
           $to = $request->to;

           $results = DB::table('employees')
           ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
           ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
           ->leftJoin('countries', 'employees.country_id', '=', 'countries.id')
           ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.id')
           ->select('employees.*', 'departments.name as department_name', 'departments.id as department_id', 'divisions.name as division_name', 'divisions.id as division_id')
           ->whereBetween('date_joined', [$from, $to])
           ->paginate(5);

           return view('Reports.index', compact('results', 'from', 'to', 'from'));
    }

    public function excel($to, $from)
    {
        $this->prepareExportingData($to, $from)->export('xlsx');
    }

    private function prepareExportingData($to, $from) {
        $author = Auth::user()->username;
        $employees = $this->getExportingData(['from'=> $from, 'to' => $to]);
        return Excel::create('report_from_'. $from.'_to_'.$to, function($excel) use($employees, $request, $author) {

        // Set the title
        $excel->setTitle('List of Employees from '. $from .' to '. $to);

        // Chain the setters
        $excel->setCreator($author)
            ->setCompany('SinghatehAlagie');

        // Call them separately
        $excel->setDescription('List of Employees');

        $excel->sheet('Employees', function($sheet) use($employees) {

        $sheet->fromArray($employees);
            });
        });
    }
}
