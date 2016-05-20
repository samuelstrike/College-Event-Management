<!DOCTYPE html>
<html  lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <link rel="icon" href="{{ asset('img') }}/favicon.png">
    
    <title>{{ config('app.name') }} - {{ $page_title or ''}}</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- FONT AWESOME ICONS  -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>cems.cst@rub.edu.bt
                    &nbsp;&nbsp;
                    <strong>College of Science and Technology </strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>      
          <!--   <a class="navbar-brand" href="{{ url('/') }}">
                <span class="glyphicon glyphicon-calendar"></span> {{ config('app.name') }}
            </a> -->
            </div>

            <div class="right-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
                         <img src="{{ asset('images/emslogo.png') }}" alt="logo" class="img-rounded" />               
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="{{ url('/') }}"> Home</a></li>
                            <li><a href="{{ url('events/create') }}"> Add Event</a></li>
                            
                              @if(Auth::user())
                            <li><a href="{{ url('events') }}"> Events List</a></li>
                            <li><a href="{{ url('auth/logout') }}"> Logout</a></li>
                              @else
                            <!-- <li><a href="{{ url('auth/login') }}"> Login</a></li> -->
                            <li><a href="{{ url('auth/register') }}"> Register</a></li>
                            @endif
                            <li><a href="{{ url('manual') }}"></span> Help ??</a></li>
                          
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
     <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                      @yield('content')

                </div>

            </div>
           
            
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
     <footer>
        <div class="container">
            <div class="row" align="center">
                <div class="col-md-12">
                    Copyright &copy; 2016 College of Science and Technology | By : <a href="http://cst.edu.bt/index.php/portfolio/b-e-it-engineering-2/" target="_blank">ITD</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END--> 
    <!-- CORE JQUERY SCRIPTS -->
    <script src="{{ asset('assets/js/jquery-1.11.1.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <script src="{{ asset('fullcalendar/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
  
       @yield('js')
       
  </body>
</html>