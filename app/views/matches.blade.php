@extends('layouts.default')
@section('header')

      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
         @if(!Auth::check())
            <li><a href="/create">Register</a></li>
         @else
            <li class="active"><a href="/matches">Overtime</a></li>
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
<div class="container" style="text-align: center;">
    <div class="col-md-7">
        {{--<div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Add Overtime</h3>
          </div>
          <div class="panel-body">
            <div class="input-group">
              <input type="text" class="form-control" id="basic_example_1" placeholder="OT Start">
              <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
            </div><br>
            <div class="input-group">
              <input type="text" class="form-control" id="basic_example_1" placeholder="OT Ends">
              <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
            </div><br>
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle">
                Add
              </button>
            </div>
          </div>
         </div>--}}
         <div class="panel-group" id="accordion">
           <div class="panel panel-primary">
             <div class="panel-heading">
               <h4 class="panel-title" style="text-align: left;">
                   Add Overtime
                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="float:right;"><span class="glyphicon glyphicon-plus"></span></a>
               </h4>
             </div>
             <div id="collapseOne" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-7">
                     <div class="input-group time">
                       <input type="text" class="form-control" id="basic_example_1" placeholder="OT Start">
                       <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                     </div><br>
                     <div class="input-group time">
                       <input type="text" class="form-control" id="basic_example_2" placeholder="OT Ends">
                       <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                     </div><br>
                     <div class="btn-group">
                       <button type="button" class="btn btn-primary dropdown-toggle">
                         Add
                       </button>
                     </div>
                 </div>
                 <div class="col-md-5">
                 Total Time:
                 </div>
               </div>
             </div>
           </div>
           <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title" style="text-align: left;">
                  Add Overtime <span style="color:red; font-weight: bold">LIVE!</span>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="float:right;"><span class="glyphicon glyphicon-plus"></span></a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class='col-md-4'>
                    <input type='text' class='form-control timer' placeholder='0 sec' />
                </div>
                <div class='col-md-4 timer-btn'>
                    <button class='btn btn-success start-timer-btn'>Start</button>
                    <button class='btn btn-success resume-timer-btn hidden'>Resume</button>
                    <button class='btn pause-timer-btn hidden'>Pause</button>
                    <button class='btn btn-danger remove-timer-btn hidden'>Remove Timer</button>
                </div>
                <div class='col-md-4'>

                </div>
              </div>
            </div>
          </div>
         </div>




    </div>
    <div class="col-md-5">
    <div class="panel panel-primary">

          <div class="panel-body">
          </div>
     </div>
    </div>
</div>
@stop
@section('footer')
<script>
var dateToday = new Date();
var hasTimer = false;
$('#basic_example_1').timepicker({
        timeFormat: 'hh:mm:ss tt',
        showSecond:true
});
$('#basic_example_2').timepicker({
        timeFormat: 'hh:mm:ss tt',
        showSecond:true
});

/*
    Init timer start
*/
$('.start-timer-btn').on('click', function(){
    hasTimer = true;
    $('.timer').timer();
    $(this).addClass('hidden');
    $('.pause-timer-btn, .remove-timer-btn').removeClass('hidden');
});

/*
    Init timer resume
*/
$('.resume-timer-btn').on('click', function(){
    $('.timer').timer('resume');
    $(this).addClass('hidden');
    $('.pause-timer-btn, .remove-timer-btn').removeClass('hidden');
});


/*
    Init timer pause
*/
$('.pause-timer-btn').on('click', function(){
    $('.timer').timer('pause');
    $(this).addClass('hidden');
    $('.resume-timer-btn').removeClass('hidden');
});

/*
    Remove timer
*/
$('.remove-timer-btn').on('click', function(){
    hasTimer = false;
    $('.timer').timer('remove');
    $(this).addClass('hidden');
    $('.start-timer-btn').removeClass('hidden');
    $('.pause-timer-btn, .resume-timer-btn').addClass('hidden');
});

/*
    Additional focus event for this demo
*/
$('.timer').on('focus', function(){
    if(hasTimer) $('.pause-timer-btn').click();
});

/*
    Additional blur event for this demo
*/
$('.timer').on('blur', function(){
    if(hasTimer) $('.resume-timer-btn').click();
});
</script>

@stop
