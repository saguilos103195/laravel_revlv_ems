@extends('web')

@section('link')
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/normalize.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
@stop


@section('content')

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
        <h1 class="new-exp">New Expense</h1>
        <form action="{{route('expenses.store')}}" method="POST" >
            <div>
                <select class="select-interface" name="type" required="required">
                    <option disabled selected value>Expense Type</option>
                    <option>Food</option>
                    <option>Transportation</option>
                    <option>Utilities</option>
                    <option>Miscellaneous</option>
                </select>
                <span class="peso">₱</span><input class="amount-interface" type="number" name="amount" placeholder="Enter Amount" required="required">
                <input class="date-interface" type="date" name="date" placeholder="Enter Date" required="required">
            </div>
            <div>
                <select class="select-interface" name="employee_id" required="required">
                    <option disabled selected value>Select Employee</option>
                    @foreach($employees as $employee)
                    @if($employee->status == 'active')
                    <option value="{{$employee->id}}">{{$employee->first_name . " " . $employee->last_name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div>
                <textarea class="remarks-interface" type="text" name="remarks" placeholder="Enter Remarks" required="required"></textarea>
            </div>
            <div>
                <button class="btnadd-interface" type="submit">Add Expense</button>
            </div>

        </form>
    </div>
    @foreach($expenses as $expense)
    <div class="expense-interface">
        <div>
            <div class="tooltip"><img class="employee-pic" src="uploads/{{$expense->employee->pic}}.jpg" width="50">
                <span class="tooltiptext1">{{ $expense->employee->first_name }} {{ $expense->employee->last_name }}</span>
            </div>
            <div class="tooltip float-right"><a href="{{route('expenses.edit',$expense->id)}}" class="fa fa-pencil int-icon" aria-hidden="true"></a>
                <span class="tooltiptext2">Edit</span>
            </div>
        </div>
        <h1 class="expense-text">{{$expense->type}}</h1>
        <p class="expense-date">{{$expense->date}}</p>
        <p class="expense-text">{{"Amount: ₱" . number_format($expense->amount,2)}}</p>
        <p class="expense-remarks">{{"Remarks: " . $expense->remarks}}</p>
    </div>
    @endforeach
</div>
</div>

@stop