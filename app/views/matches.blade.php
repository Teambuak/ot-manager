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
    <div class="col-md-9">
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
                  <div class="col-md-3">
                     <div class="input-group time">
                       <input type="text" class="form-control" id="basic_example_date" placeholder="OT Date">
                       <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                     </div><br>
                     <div class="input-group time">
                       <input type="text" class="form-control" id="basic_example_1" placeholder="OT Start">
                       <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                     </div><br>
                     <div class="input-group time">
                       <input type="text" class="form-control" id="basic_example_2" placeholder="OT Ends">
                       <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                     </div><br>
                     <div class="input-group time">
                        <input type="password" class="form-control" id="basic_example_3" placeholder="Monthly Salary">
                        <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                     </div><br>
                     <div class="input-group time">
                        <textarea class="form-control" id="basic_example_description" style="resize: none;" placeholder="Description"></textarea>
                        <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                      </div><br>
                     <div class="btn-group">
                       <button type="button" id="add-ot" class="btn btn-primary dropdown-toggle">
                         Add
                       </button>
                     </div>
                 </div>
                 <div class="col-md-9 description">
                 OT Description:
                    <table class="table" id="ot-table" style="font-size: 12">
                    <tbody>
                        <tr>
                            <th>Date</th>
                            <th>Start</th>
                            <th>Ends</th>
                            <th>Description</th>
                            <th>Total OT</th>
                        </tr>
                    </tbody>

                    </table>
                 </div>
               </div>
             </div>
           </div>
           <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title" style="text-align: left;">
                  Add Overtime <span style="color:red; font-weight: bold">LIVE!</span> <span class="glyphicon glyphicon-play" id="play" style="display: none; margin-left: 20px; color:red;"></span><span class="glyphicon glyphicon-pause" id="pause" style="display: none; margin-left: 20px; color:red;"></span><span class="glyphicon glyphicon-stop" id="stop" style="display: none; margin-left: 20px; color:red;"></span>
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
                Total OT Time:<br>
                    <div id="live-timer"></div>
                </div>
              </div>
            </div>
          </div>
         </div>
    </div>
    <div class="col-md-3">
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
var in_hour =0;
var in_min =0;
var in_sec =0;
var out_hour =0;
var out_min =0;
var out_sec =0;

$("#add-ot").click(function(){
  var ot_date = $("#basic_example_date").val();
  var ot_time_in = $("#basic_example_1").val();
  var ot_time_out = $("#basic_example_2").val();
  var ot_description = $("#basic_example_description").val();
  var salary = $("#basic_example_3").val();
  var monthly_salary = 0;
  var daily_salary = 0;
  var hourly_salary = 0;
  var min_salary = 0;
  var sec_salary = 0;

  var total_ot_salary = 0;
  var total_hour_ot_salary = 0;
  var total_min_ot_salary = 0;
  var total_sec_ot_salary = 0;

  var ot_time_in_split = ot_time_in.split(':');//split (explode in php) ot_time_in to array
  var ot_time_out_split = ot_time_out.split(':');//split (explode in php) ot_time_out to array
  var ot_time_in_split_ampm = ot_time_in_split[2].split(' ');//split 3rd array in time ss:ampm
  var ot_time_out_split_ampm = ot_time_out_split[2].split(' ');//split 3rd array in time ss:ampm

  var total_ot_hours = 0;
  var total_ot_min = 0;
  var total_ot_sec = 0;

   in_hour = parseInt(ot_time_in_split[0]);
   in_min = parseInt(ot_time_in_split[1]);
   in_sec = parseInt(ot_time_in_split_ampm[0]);

   out_hour = parseInt(ot_time_out_split[0]);
   out_min = parseInt(ot_time_out_split[1]);
   out_sec = parseInt(ot_time_out_split_ampm[0]);

  if(ot_time_in_split_ampm[1] == 'pm')
    in_hour =  in_hour + 12;
  if(ot_time_in_split_ampm[1] == 'pm')
    out_hour =  out_hour + 12;

  total_ot_hours = out_hour - in_hour;
  total_ot_min = out_min + in_min;
  total_ot_sec = in_sec + out_sec;

  //console.log('OT min = ' + total_ot_min);
  if(total_ot_min>=60)
  {
      total_ot_hours = total_ot_hours + 1;
      total_ot_min = total_ot_min - 60;
  }
  if(total_ot_sec>=60)
  {
      total_ot_min = total_ot_min + 1;
      total_ot_sec = total_ot_sec - 60;
  }

  monthly_salary = salary/2;
  daily_salary = monthly_salary/15;
  hourly_salary = daily_salary/24;
  min_salary = hourly_salary/60;
  sec_salary = min_salary/60;

  total_hour_ot_salary = hourly_salary * total_ot_hours;
  total_min_ot_salary = min_salary * total_ot_min;
  total_sec_ot_salary = sec_salary * total_ot_sec;
  total_ot_salary = total_hour_ot_salary + total_min_ot_salary + total_sec_ot_salary;


  /*console.log('OT hours = ' + total_ot_hours);
  console.log('OT min = ' + total_ot_min);
  console.log('OT sec = ' + total_ot_sec);
  console.log('ot hour salary = ' + total_hour_ot_salary);
  console.log('ot min salary = ' + total_min_ot_salary);
  console.log('ot sec salary = ' + total_sec_ot_salary);
  console.log('Total OT salary = ' + total_ot_salary.toFixed(2));*/


    if(ot_date != '' && ot_time_in != '' && ot_time_out != '' && ot_description != ''){
        $("#ot-table tr:last").after(
                                    "<tr>"+
                                        "<td>"+ ot_date +"</th>"+
                                        "<td>"+ ot_time_in +"</th>"+
                                        "<td>"+ ot_time_out +"</th>"+
                                        "<td>"+ ot_description +"</th>"+
                                        "<td>"+ total_ot_salary.toFixed(2) +"( "+ total_ot_hours +" hrs."+ total_ot_min+" min."+ total_ot_sec +"secs.)"+"</th>"+
                                    "</tr>"
        );
         ot_date = $("#basic_example_date").val('');
         ot_time_in = $("#basic_example_1").val('');
         ot_time_out = $("#basic_example_2").val('');
         ot_description = $("#basic_example_description").val('');
         salary = $("#basic_example_3").val('');
    }
});
$("#basic_example_date").datepicker({
    dateFormat:'yy-mm-dd'
});
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
    $("#play").show();
    $("#pause").hide();
    $("#stop").hide();

});

/*
    Init timer resume
*/
$('.resume-timer-btn').on('click', function(){
    $('.timer').timer('resume');
    $(this).addClass('hidden');
    $('.pause-timer-btn, .remove-timer-btn').removeClass('hidden');
    $("#play").show();
    $("#pause").hide();
    $("#stop").hide();
});


/*
    Init timer pause
*/
$('.pause-timer-btn').on('click', function(){
    $('.timer').timer('pause');
    $(this).addClass('hidden');
    $('.resume-timer-btn').removeClass('hidden');
    $("#play").hide();
    $("#pause").show();
    $("#stop").hide();
});

/*
    Remove timer
*/
$('.remove-timer-btn').on('click', function(){
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var output = d.getFullYear() + '/' +
        (month<10 ? '0' : '') + month + '/' +
        (day<10 ? '0' : '') + day;

    hasTimer = false;
    $('.timer').timer('remove');
    $(this).addClass('hidden');
    $('.start-timer-btn').removeClass('hidden');
    $('.pause-timer-btn, .resume-timer-btn').addClass('hidden');
    $("#play").hide();
    $("#pause").hide();
    $("#stop").show();
    $("#live-timer").html(output+': '+$('.timer').val());
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
    if(hasTimer){
        $('.resume-timer-btn').click();
        $("#play").hide();
        $("#pause").show();
        $("#stop").hide();
    }
},function(){
    $("#play").show();
    $("#pause").hide();
    $("#stop").hide();
    $('.resume-timer-btn').click();
});
</script>

@stop
