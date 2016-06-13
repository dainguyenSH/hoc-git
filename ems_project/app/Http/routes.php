<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('employee.index');
// });

Route::get('info', function () {
	return view('employee.info');
});

Route::get('info/{id}', 'EmployeeController@show');

Route::get('edit/{id}', 'EmployeeController@edit');

Route::get('add', 'EmployeeController@create');
Route::post('store', 'EmployeeController@store');

Route::get('/', 'EmployeeController@index');

Route::delete('delete/{id}', 'EmployeeController@destroy');

Route::get('edit/{id}', 'EmployeeController@edit');

Route::patch('update/{id}', 'EmployeeController@update');
