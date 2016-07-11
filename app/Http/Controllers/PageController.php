<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

use App\Expense;

use App\Category;

use DB;

class PageController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function expenses()
    {
        $expenses = Expense::get();
        $employees = Employee::get();
        return view('pages.expenses', [
            'expenses' => $expenses,
            'employees' => $employees
        ]);
    }

    public function employees()
    {
        $employees = Employee::get();
        return view('pages.employees', [
            'employees' => $employees
        ]);
    }
}
