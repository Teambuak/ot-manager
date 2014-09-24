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
<div class="container" style="text-align: center;">
    <div class="col-md-5">

    </div>
    <div class="col-md-7">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Add Game</h3>
          </div>
          <div class="panel-body">
          </div>
         </div>
        <div class="panel-group" id="accordion">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Match History
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
              <div class="row">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>K/D/A</th>
                        <th>Hero</th>
                        <th>Match End</th>
                        <th>Items</th>
                        <th>note</th>
                    </tr>
                    <tr class="table-tr" style="background-color: lightgreen">
                        <td>1</td>
                        <td>25/3/8</td>
                        <td><img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;"></td>
                        <td>40 min.</td>
                        <td><img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;">
                            <img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;">
                            <img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;">
                            <img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;">
                            <img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;">
                            <img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;">
                            <img src="http://ddragon.leagueoflegends.com/cdn/4.15.1/img/champion/Caitlyn.png" style="width: 25px; height:25px;">
                        </td>
                        <td style="text-align: center;"><span class="glyphicon glyphicon-file"></span></td>
                    </tr>
                </table>
                </div>
              </div>
             </div>
            </div>
          </div>
    </div>
</div>
@stop
@section('footer')
<!-- footer contents -->
@stop
