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
        <li><a href="/">Home</a></li>
         @if(!Auth::check())
            <li><a href="/create">Register</a></li>
         @else
            <li class="active"><a href="/matches">My Matches</a></li>
         @endif
      </ul>
      @if(Auth::check())
       <ul class="nav navbar-nav navbar-right">
        <li><a><span>Welcome, {{Auth::user()->firstname;}}</span></a></li>
        <li><a href="/logout">(logout)</a></li>
       </ul>
      @else
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Login</a></li>
        </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>
@stop
@section('content')
<!-- body contents -->
@stop
@section('footer')
<!-- footer contents -->
@stop
