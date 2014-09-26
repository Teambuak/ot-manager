@extends('layouts.default')
@section('header')
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
         @if(!Auth::check())
            <li><a href="/create">Register</a></li>
         @else
            <li><a href="/overtime">Overtime</a></li>
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

@stop
@section('content')
<!-- body contents -->
@stop
@section('footer')
<!-- footer contents -->
@stop
