@extends('layouts.default')
@section('header')
          <ul class="nav navbar-nav">
            <li ><a href="/">Home</a></li>
            <li class="active"><a href="/create">Register</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Login</a></li>
          </ul>

@stop
@section('content')
<div class="container" style="text-align: center;">
    {{Form::open(['url'=>'/']);}}

            <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Account Info</h3>
              </div>
              <div class="panel-body">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                  <span class="error">{{$errors->first('username')}}</span>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                  <span class="error">{{$errors->first('password');}}</span>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                  <input type="text" class="form-control" name="email" placeholder="Email" required email>
                </div>
                 <span class="error">{{$errors->first('email');}}</span>
                 <br>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                  <input type="text" class="form-control" name="company" placeholder="Company" required>
                </div>
                <span class="error">{{$errors->first('company');}}</span>
                </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Personal Info</h3>
                  </div>
                  <div class="panel-body">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                    </div>
                     <span class="error">{{$errors->first('firstname');}}</span>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    </div>
                     <span class="error">{{$errors->first('lastname');}}</span>
                    <br>
                    <label style="margin-right:20px;">Date of Birth:</label>
                     <select class="custom-dropdown" name="month">
                        <option value="January">January</option>
                        <option value="Febuary">Febuary</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                     </select>
                     <input class="day" type="text" class="day" name="day" placeholder="dd" maxlength="2" required>,
                     <input class="month" type="text" class="year" name="year" placeholder="yyyy" maxlength="4" required><br>
                     <span class="error">{{$errors->first('day'); $errors->first('year');}}</span>
                    </div>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success fade in" role="alert" style="text-align:center;"> <span class="glyphicon glyphicon-ok"></span>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></span><span class="sr-only"></span></button>
                {{Session::get('success');}}
                </div>
               @endif
                <div class="btn-group">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
          </div>
    {{Form::close();}}
</div>

@stop
@section('footer')
<!-- footer contents -->
@stop
