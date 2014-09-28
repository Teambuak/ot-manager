<html>

    <head>
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

   <!-- Google Fonts -->
   <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    {{ HTML::style('css/style.css'); }}

    </head>

    <header>
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
          <a class="navbar-brand" href="/">OT Manager</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        @yield('header')
        </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
          </div>
        </nav>
    </header>



    <body>
        @yield('content')
    </body>


    <footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        {{HTML::script('js/jquery-ui-timepicker-addon.js')}}
        {{HTML::script('js/timer.jquery.js')}}
        {{HTML::script('js/jquery.quovolver.min.js')}}

        @yield('footer')
    </footer>

</html>