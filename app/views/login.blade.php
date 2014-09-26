@extends('layouts.default')
@section('header')

          <ul class="nav navbar-nav">
            <li ><a href="/">Home</a></li>
            <li ><a href="/create">Register</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="/login">Login</a></li>
          </ul>

@stop
@section('content')
<div class="container">
    <div class="login-form">
        {{Form::open(['url'=>'login']);}}
            <h2 class="form-signin-heading"></h2>
            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span>Don't have an account? Register <a href="/create">here</a></span><br>
            <span>Forgot your password? Click <a href="#">here</a> </span>
            <br><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            @if(Session::has('error'))
                <span class="error">{{Session::get('error')}}</span>
            @endif
        {{Form::close();}}
    </div>
</div>
@stop
@section('footer')
<!-- footer contents -->
@stop
