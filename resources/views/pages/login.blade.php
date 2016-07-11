@extends('web')

@section('link')
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/normalize.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">
@stop


@section('content')
<div class="wrapper roboto">
    <div class="login center">
        <div class="clearfix">
            <form action="login" method="POST">
                <h1 class="title">REVLV-EMS</h1>
                <div class="invalid">                </div>
                <p><input class="type-interface orbitron" type="text" name="username" placeholder="username" autocomplete="off"></p>
                <p><input class="type-interface orbitron" type="password" name="password" placeholder="password"></p>
                <p><button class="btn-interface orbitron" type="submit">login</button></p>
            </form>
    </div>
    </div>
</div>
@stop
