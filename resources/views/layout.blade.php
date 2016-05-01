<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img') }}/favicon.png">

    <title>{{ config('app.name') }} - {{ $page_title or ''}}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.js') }}"></script>

     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
     <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><span class="glyphicon glyphicon-calendar"></span> {{ config('app.name') }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('events/create') }}"><span class="glyphicon glyphicon-log-in"></span> Add Event</a></li>
            <li><a href="{{ url('manual') }}"><span class="glyphicon glyphicon-info-sign"></span> User Manual</a></li>
            
              @if(Auth::user())
            <li><a href="{{ url('events') }}"><span class="glyphicon glyphicon-list"></span> Events List</a></li>
            <li><a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              @else
            <li><a href="{{ url('auth/register') }}"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  
    <div class="container">

        @yield('content')
    
    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset('fullcalendar/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
  
       @yield('js')
  
  </body>
</html>