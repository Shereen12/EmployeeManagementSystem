<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/employees', 'EmployeeController@index');

Route::get('employees/create', 'EmployeeController@create')->name('employeeCreate');

Route::post('employees/create', 'EmployeeController@store')->name('employeeStore');

Route::delete('employees/delete/{id}', 'EmployeeController@delete')->name('employeeDelete');

Route::get('employees/edit/{id}', 'EmployeeController@edit')->name('employeeEdit');

Route::post('employees/update/{id}', 'EmployeeController@update')->name('employeeUpdate');

Route::post('employees/search', 'EmployeeController@search')->name('employeeSearch');



Route::get('/departments', 'DepartmentController@index');

Route::get('departments/add', 'DepartmentController@create')->name('departmentCreate');

Route::delete('departments/delete/{id}', 'DepartmentController@delete')->name('departmentDelete');

Route::get('departments/edit/{id}', 'DepartmentController@edit')->name('departmentEdit');

Route::post('departments/create', 'DepartmentController@store')->name('departmentStore');

Route::get('departments/edit/{id}', 'DepartmentController@edit')->name('departmentEdit');

Route::post('departments/update/{id}', 'DepartmentController@update')->name('departmentUpdate');

Route::post('departments/search', 'DepartmentController@search')->name('departmentSearch');




Route::get('/divisions', 'DivisionController@index');

Route::get('divisions/add', 'DivisionController@create')->name('divisionCreate');

Route::delete('divisions/delete/{id}', 'DivisionController@delete')->name('divisionDelete');

Route::get('divisions/edit/{id}', 'DivisionController@edit')->name('divisionEdit');

Route::post('divisions/create', 'DivisionController@store')->name('divisionStore');

Route::delete('divisions/delete/{id}', 'DivisionController@delete')->name('divisionDelete');

Route::post('divisions/update/{id}', 'DivisionController@update')->name('divisionUpdate');

Route::post('divisions/search', 'DivisionController@search')->name('divisionSearch');




Route::get('/countries', 'CountryController@index');

Route::get('countries/add', 'CountryController@create')->name('countryCreate');

Route::delete('countries/delete/{id}', 'CountryController@delete')->name('countryDelete');

Route::get('countries/edit/{id}', 'CountryController@edit')->name('countryEdit');

Route::post('countries/create', 'CountryController@store')->name('countryStore');

Route::delete('countries/delete/{id}', 'CountryController@delete')->name('countryDelete');

Route::post('countries/update/{id}', 'CountryController@update')->name('countryUpdate');

Route::post('countries/search', 'CountryController@search')->name('countrySearch');



Route::get('/cities', 'CityController@index');

Route::get('cities/add', 'CityController@create')->name('cityCreate');

Route::delete('cities/delete/{id}', 'CityController@delete')->name('cityDelete');

Route::get('cities/edit/{id}', 'CityController@edit')->name('cityEdit');

Route::post('cities/create', 'CityController@store')->name('cityStore');

Route::post('cities/update/{id}', 'CityController@update')->name('cityUpdate');

Route::post('cities/search', 'CityController@search')->name('citySearch');




Route::get('/users', 'UserController@index');

Route::get('/user/create', 'UserController@create')->name('userCreate');

Route::post('user/create', 'UserController@store')->name('userstore');

Route::delete('users/delete/{id}', 'UserController@delete')->name('userDelete');

Route::get('users/edit/{id}', 'UserController@edit')->name('userEdit');

Route::post('users/update/{id}', 'UserController@update')->name('userUpdate');

Route::post('users/search', 'UserController@search')->name('userSearch');


