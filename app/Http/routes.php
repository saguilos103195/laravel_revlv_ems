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

use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', 'PageController@login');

// Route::get('home', 'PageController@home');

// Route::get('employees', 'PageController@employees');

// Route::get('expenses', 'PageController@expenses');

Route::resource('expenses', 'ExpenseController');
Route::resource('employees', 'EmployeeController');