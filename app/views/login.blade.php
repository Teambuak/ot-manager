@extends('layouts.default')
@section('header')
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">LoL Tracker</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li ><a href="/">Home</a></li>
            <li ><a href="/create">Register</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="/login">Login</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </div>
</nav>
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
