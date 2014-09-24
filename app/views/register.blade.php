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
            <li class="active"><a href="/create">Register</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Login</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </div>
</nav>
@stop
@section('content')
<div class="container">
    {{Form::open(['url'=>'/']);}}

            <div class="col-md-4" style="text-align: center;">
                <div class="profile-picture">photo</div>
            </div>
            <div class="col-md-8">
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
                <div class="region">
                    <label for="region">Region:</label>
                    <select class="custom-dropdown" name="region">
                        <option value="NA">NA</option>
                        <option value="EUWest">EU West</option>
                        <option value="EUEast">EU Eest</option>
                        <option value="Korea">KR</option>
                        <option value="China">CN</option>
                        <option value="SEA">SEA</option>
                        <option value="other">Others</option>
                    </select>
                </div>
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
