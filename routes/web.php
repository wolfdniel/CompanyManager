<?php

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

Route::get('/companies', 'CompanyController@index')->name('companies.index');
Route::get('/companies/create', 'CompanyController@create')->name('companies.create');
Route::post('/companies', 'CompanyController@store')->name('companies.store');
Route::get('/companies/{company}', 'CompanyController@show')->name('companies.show');

Route::get('/companies/{company}/employees/create',
    'EmployeeController@create')->name('employees.create');
Route::post('/companies/{company}/employees',
    'EmployeeController@store')->name('employees.index');
Route::get('companies/{company}/employees/{employee}/edit',
    'EmployeeController@edit')->name('employees.edit');
Route::patch('/companies/{company}/employees/{employee}',
    'EmployeeController@update')->name('employees.update');
Route::delete('/companies/{company}/employees/{employee}',
    'EmployeeController@destroy')->name('employees.destroy');