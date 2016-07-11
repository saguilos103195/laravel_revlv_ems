@extends('web')

@section('link')
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/normalize.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
@stop


@section('content')


<?php $types = ['Food', 'Transportation', 'Utilities', 'Miscellaneous']; ?>


<div class="wrapper">
<header class="clearfix push-top">
    <div>
    <img src="/img/credit-card.png" width="70">
    <h2 class="inline-block credit">REVLV-Expense Management</h2>
    <button class="inline-block float-right btn-interface">logout</button>
    </div>
    <hr>
    <div class="push-top">
        <span class="welcome">
        <i class="fa fa-user" aria-hidden="true"></i>
        Welcome, Administrator
        </span>
        <input class="search float-right" type="text" name="search" placeholder="Search here..">
    </div>
    <div class="push-top">
        <a href="/expenses" class="inline-block menu-interface">Expenses</a>
        <a href="/employees" class="inline-block menu-interface float-right">Employees</a>
    </div>
</header>
<div class="clearfix">
    <div class="expense-interface">
        <div>
            <h1 class="new-exp inline-block">Edit Expense</h1>
            <form action="{{ route('expenses.destroy',$expense->id) }}" class="inline-block float-right" method="POST"><input type="hidden" name="_method" value="DELETE">
            <div class="tooltip float-right"><button type="submit" class="btn-delete fa fa-trash-o int-icon" aria-hidden="true"></button>
                <span class="tooltiptext3">Delete</span>
            </div>
            </form>
        </div>
        <form action="{{ route('expenses.update',$expense->id) }}" method="POST"><input type="hidden" name="_method" value="PUT">
            <div>
                <select class="select-interface" name="type" required="required">
                    <option disabled selected value>Expense Type</option>
                    @foreach($types as $type)
                    @if($type == $expense->type)
                    <option selected="selected">{{$type}}</option>
                    @else
                    <option>{{$type}}</option>
                    @endif
                    @endforeach
                </select>
                <span class="peso">₱</span><input class="amount-interface" type="number" name="amount" placeholder="Enter Amount" required="required" value="{{$expense->amount}}">
                <input class="date-interface" type="date" name="date" placeholder="Enter Date" required="required" value="{{$expense->date}}">
            </div>
            <div>
                <select class="select-interface" name="employee_id" required="required">
                    <option disabled selected value>Select Employee</option>
                    @foreach($employees as $employee)
                    @if($employee->id == $expense->employee_id)
                    <option value="{{$employee->id}}" selected="selected">{{$employee->first_name . " " . $employee->last_name}}</option>
                    @else
                    <option value="{{$employee->id}}"">{{$employee->first_name . " " . $employee->last_name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div>
                <textarea class="remarks-interface" type="text" name="remarks" placeholder="Enter Remarks" required="required">{{$expense->remarks}}</textarea>
            </div>
            <div>
                <button class="btnadd-interface" type="submit">Update Expense</button>
            </div>

        </form>
    </div>
</div>
</div>
@stop