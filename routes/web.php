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

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/get_units_by_floor/{floor_id}', 'FloorController@searchUnitByFloor');

Route::get('/customer_save', 'CustomerController@customer_save');
Route::post('/save/customer_data', 'CustomerController@save_customer_walking');


Route::get('/employee_list', 'EmployeeController@employee_list');
Route::get('/employee_save', 'EmployeeController@employee_save');
Route::post('/save/employee_data', 'EmployeeController@save_employee_data');


Route::get('/view_customer_walking', 'CustomerController@view_customer_walking');
Route::post('/view_customer_walking', 'CustomerController@view_customer_walking');
