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
<div class="container">

{{HTML::image('images/banner1.jpg',NULL,['class' =>'banner hidden-xs']);}}
<div class="quotes-wrapper hidden-xs">
    <div class="quotes">
        <blockquote>
        {{HTML::image('images/testi-images/professional1.jpg',NULL,['class' =>'testi-image']);}}
        <p><span>“</span>Very Awesome,<br> I can now track my overtime with no worries... <span>”</span></p>
        <p>— Larry G.</p>
        </blockquote>

        <blockquote>
        {{HTML::image('images/testi-images/professional2.jpg',NULL,['class' =>'testi-image']);}}
        <p><span>“</span>I will recommend this to my friends and co-workers.  <span>”</span></p>
        <p>— Joseph S.</p>
        </blockquote>

    </div><!-- .quotes -->
</div>

</div>
@stop
@section('footer')
<script>
$('.quotes').quovolver();
</script>
@stop
