@extends('web')

@section('link')
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/normalize.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
@stop


@section('content')


<?php $positions = ['Software Lead', 'Graphics Artist', 'Technical Sales', 'Systems Analyst', 'Software Developer', 'OJT']; ?>

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
    @if($employee->status == 'active')
    <div class="expense-interface">
        <div>
            <h1 class="new-exp inline-block">Edit Employee</h1>
            <form action="{{ route('employees.destroy',$employee->id) }}" class="inline-block float-right" method="POST"><input type="hidden" name="_method" value="DELETE">
            <div class="tooltip float-right"><button type="submit" class="btn-delete fa fa-trash-o int-icon" aria-hidden="true"></button>
                <span class="tooltiptext3">Delete</span>
            </div>
            </form>
        </div>
        <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data"><input type="hidden" name="_method" value="PUT">
            <div>
                <input class="info-interface" type="text" name="first_name" required="required" placeholder="Enter Firstname" value="{{$employee->first_name}}">
                <input class="info-interface" type="text" name="last_name" required="required" placeholder="Enter Lastname" value="{{$employee->last_name}}">
                <select class="select-interface" name="position" required="required">
                    <option disabled selected value>Select Position</option>
                    @foreach($positions as $position)
                    @if($position == $employee->position)
                    <option selected="selected">{{$position}}</option>
                    @else
                    <option>{{$position}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div>
                <input class="bdate-interface" type="date" name="birth_date" required="required" value="{{$employee->birth_date}}">
            </div>
            <div>
                <input class="info-interface" type="file" name="employee_pic" required="required">
            </div>
            <div>
                <button class="btnadd-interface" type="submit">Update Employee</button>
            </div>

        </form>
    </div>
    @else
    <div class="inactive-interface">
        <div>
            <h1 class="new-exp inline-block">Edit Employee</h1>
            <form action="{{ route('employees.destroy',$employee->id) }}" class="inline-block float-right" method="POST"><input type="hidden" name="_method" value="DELETE">
            <div class="tooltip float-right"><button type="submit" class="btn-delete fa fa-reply int-icon" aria-hidden="true"></button>
                <span class="tooltiptext2">Restore</span>
            </div>
            </form>
        </div>
        <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data"><input type="hidden" name="_method" value="PUT">
            <div>
                <input disabled="true" class="info-interface" type="text" name="first_name" required="required" placeholder="Enter Firstname" value="{{$employee->first_name}}">
                <input disabled="true" class="info-interface" type="text" name="last_name" required="required" placeholder="Enter Lastname" value="{{$employee->last_name}}">
                <select disabled="true" class="select-interface" name="position" required="required">
                    <option disabled selected value>Select Position</option>
                    @foreach($positions as $position)
                    @if($position == $employee->position)
                    <option selected="selected">{{$position}}</option>
                    @else
                    <option>{{$position}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div>
                <input disabled="true" class="bdate-interface" type="date" name="birth_date" required="required" value="{{$employee->birth_date}}">
            </div>
            <div>
                <input disabled="true" class="info-interface" type="file" name="employee_pic" required="required">
            </div>
            <div>
                <button class="btnadd-interface" type="submit" disabled="true">Update Employee</button>
            </div>

        </form>
    </div>
    @endif
</div>
</div>
@stop