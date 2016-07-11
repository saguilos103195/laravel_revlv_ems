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
        <div class="expense-interface">
        <h1 class="new-exp">New Employee</h1>
        <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
            <div>
                <input class="info-interface" type="text" name="first_name" required="required" placeholder="Enter Firstname">
                <input class="info-interface" type="text" name="last_name" required="required" placeholder="Enter Lastname">
                <select class="select-interface" name="position" required="required">
                    <option disabled selected value>Select Position</option>
                    @foreach($positions as $position)
                    <option>{{$position}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input class="bdate-interface" type="date" name="birth_date" required="required">
            </div>
            <div>
                <input class="info-interface" type="file" name="employee_pic" required="required">
            </div>
            <div>
                <button class="btnadd-interface" type="submit">Add Employee</button>
            </div>

        </form>
        </div>
        @foreach($employees as $employee)
        @if($employee->status == 'active')
        <div class="expense-interface">
            <div class="inline-block">
                <img class="profileimg" src="/uploads/{{$employee->pic}}.jpg" width="150">
            </div>
            <div class="inline-block profile-info">
                <h1>{{$employee->first_name . " " . $employee->last_name}}</h1>
                <p>Position: {{$employee->position}}</p>
                <p>Birthdate: {{$employee->birth_date}}</p>
            </div>
            <div class="inline-block float-right">
                <div class="tooltip float-right"><a href="{{route('employees.edit',$employee->id)}}" class="fa fa-pencil int-icon" aria-hidden="true"></a>
                </div>
            </div>
        </div>
        @else
        <div class="inactive-interface">
            <div class="inline-block">
                <img class="profileimg" src="/uploads/{{$employee->pic}}.jpg" width="150">
            </div>
            <div class="inline-block profile-info">
                <h1>{{$employee->first_name . " " . $employee->last_name}}</h1>
                <p>Position: {{$employee->position}}</p>
                <p>Birthdate: {{$employee->birth_date}}</p>
            </div>
            <div class="inline-block float-right">
                <div class="tooltip float-right"><a href="{{route('employees.edit',$employee->id)}}" class="fa fa-pencil int-icon" aria-hidden="true"></a>
                </div>
            </div>
        </div>
        @endif
        @endforeach

    </div>
</div>

@stop