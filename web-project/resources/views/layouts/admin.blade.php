@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Antwerpen studentenstad</title>

        
      <!--VANAF HIER VOOR KENNY-->

  
        <!-- Morris Charts CSS -->
         <link rel="stylesheet" href="{{ asset('css/kenny/vendors/bower_components/morris.js/morris.css') }}" type="text/css"/>
  
        <!-- Data table CSS -->
        <link rel="stylesheet" href="{{ asset('css/kenny/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" type="text/css"/>
  
        <link rel="stylesheet" href="{{ asset('css/kenny/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}" type="text/css">
  
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/kenny/style.css') }}" >

        <!--fonts-->
        <link rel="stylesheet" href="{{ asset('css/kenny/themify-icons.css') }}">


      <!--TOT HIER VOOR KENNY-->

        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >

        <link rel="stylesheet" href="{{ asset('css/body.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/header.css') }}" >
        <link rel="stylesheet" href="https://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" >

    </head>
    <body>



<div class="wrapper">
      <!-- Top Menu Items -->
     <nav class="navbar navbar-inverse navbar-fixed-top">
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a href="{{ url('/') }}"><img class="brand-img pull-left logo" src="{{ asset('img/A_logo_RGB_123x123.jpg') }}" alt="brand"/></a>
        <ul class="nav navbar-right top-nav pull-right">

<!--
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#site_navbar_search">
            <i class="fa fa-search top-nav-icon"></i>
            </a>
          </li>
          <li>
            <a id="open_right_sidebar" href="javascript:void(0);"><i class="fa fa-cog top-nav-icon"></i></a>
          </li>
          
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
            <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
              <li>
                <div class="streamline message-box message-nicescroll-bar">
                  <div class="sl-item">
                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                      <img class="img-responsive img-circle" src="dist/img/user.png" alt="avatar"/>
                    </div>
                    <div class="sl-content">
                      <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">Sandy Doe</a>
                      <span class="inline-block font-12  pull-right">12/10/16</span>
                      <div class="clearfix"></div>
                      <p>Neque porro quisquam est!</p>
                    </div>
                  </div>
                  <hr/>
                  <div class="sl-item">
                    <div class="icon">
                      <i class="fa fa-spotify"></i>
                    </div>
                    <div class="sl-content">
                      <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">
                      2 voice mails</a>
                      <span class="inline-block font-12  pull-right">2pm</span>
                      <div class="clearfix"></div>
                      <p>Neque porro quisquam est</p>
                    </div>
                  </div>
                  <hr/>
                  <div class="sl-item">
                    <div class="icon">
                      <i class="fa fa-whatsapp"></i>
                    </div>
                    <div class="sl-content">
                      <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">8 voice messanger</a>
                      <span class="inline-block font-12 pull-right">1pm</span>
                      <div class="clearfix"></div>
                      <p>8 texts</p>
                    </div>
                  </div>
                  <hr/>
                  <div class="sl-item">
                    <div class="icon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <div class="sl-content">
                      <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">2 new messages</a>
                      <span class="inline-block font-12  pull-right">1pm</span>
                      <div class="clearfix"></div>
                      <p>ashjs@gmail.com</p>
                    </div>
                  </div>
                  <hr/>
                  <div class="sl-item">
                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                      <img class="img-responsive img-circle" src="dist/img/user4.png" alt="avatar"/>
                    </div>
                    <div class="sl-content">
                      <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">Sandy Doe</a>
                      <span class="inline-block font-12  pull-right">1pm</span>
                      <div class="clearfix"></div>
                      <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>
-->

          <li class="dropdown">
            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{ asset('img/user1.png') }}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
              
              <li>
                <a href="{{ route('login') }}"><i class="fa fa-fw fa-laptop"></i> Inloggen</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ route('register') }}"><i class="fa fa-fw fa-pencil-square-o"></i> Registreren</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ url('/profiel') }}"><i class="fa fa-fw fa-user"></i> Profielpagina</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ url('/admin') }}"><i class="fa fa-fw fa-wrench"></i> Administratie</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off"></i> Afmelden</a>
              </li>
            </ul>
          </li>
          </ul>


<!--
                @if (Auth::guest())
                  <li><a href="{{ route('register') }}"><i class="fa fa-fw fa-user"></i>Registratiepagina</a></li>
                  <li><a href="{{ route('login') }}"><i class="fa fa-fw fa-credit-card-alt">Inloggen</a></li>
                @else
                  <li><a href="{{ url('/profiel') }}"><i class="fa fa-fw fa-envelope">Profielpagina</a></li>
                @if (Auth::user()->rol_id == 1)
                    <li><a href="{{ url('/admin') }}"><i class="fa fa-fw fa-gear">Administratie</a></li>
                @endif
                  <li><a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off">Afmelden</a></li>
                @endif

            </ul>
          </li>-->





     <div class="collapse navbar-search-overlap" id="site_navbar_search">
          <form role="search">
            <div class="form-group mb-0">
              <div class="input-search">
                <div class="input-group"> 
                  <input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
                  <span class="input-group-addon pr-30">
                  <a  href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
                  </span> 
                </div>
              </div>
            </div>
          </form>
          </div>
          </nav>


  <!--LEFT NAV BAR-->

    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
          <li>
            <a  class="active" href="{{ url('/admin') }}" data-toggle="collapse" data-target="#dashboard_dr"><i class="fa fa-fw fa-home"></i> Dashboard <span class="pull-right"><span class="label label-success mr-10">4</span></span></a>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><i class="fa fa-fw fa-users"></i> Gebruikers<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
              <li>
                <a href="{{ url('/admin/gebruikers') }}">Alle gebruikers</a>
              </li>
              <li>
                <a href="{{ url('/admin/gebruikers') }}">Administrators</a>
              </li>
              <li>
                <a href="{{ url('/admin/gebruikers') }}">Approvers</a>
              </li>
              <li>
                <a href="{{ url('/admin/gebruikers') }}">Editors</a>
              </li>
              <li>
                <a href="{{ url('/admin/gebruikers') }}">Gebruikers</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><i class="fa fa-fw fa-file-text-o"></i> Nieuwsitems <span class="pull-right"><span class="label label-info mr-10">9</span><i class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="app_dr" class="collapse collapse-level-1">
              <li>
                <a href="{{ url('admin/nieuwsitems') }}">Alle nieuwsitems</a>
              </li>
              <li>
                <a href="{{ url('admin/nieuwsitems/toevoegen') }}">Nieuwsitem toevoegen</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><i class="fa fa-fw fa-comment"></i></i> Testimonials<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="ui_dr" class="collapse collapse-level-1">
              <li>
                <a href="{{ url('admin/testimonials') }}">Alle testimonials</a>
              </li>
              <li>
                <a href="{{ url('admin/testimonials/toevoegen') }}">Testimonial toevoegen</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><i class="fa fa-fw fa-camera"></i> Bezienswaardigheden<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="form_dr" class="collapse collapse-level-1">
              <li>
                <a href="#">Optie 1</a>
              </li>
              <li>
                <a href="#">Optie 2</a>
              </li>
              <li>
                <a href="#">Optie 3</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><i class="fa fa-fw fa-mortar-board"></i> Scholen <span class="pull-right"><span class="label label-primary mr-10">7</span><i class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="chart_dr" class="collapse collapse-level-1">
              <li>
                <a href="#">Optie 1</a>
              </li>
              <li>
                <a href="#">Optie 2</a>
              </li>
              <li>
                <a href="#">Optie 3</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr"><i class="fa fa-fw fa-info"></i> Stadsinformatie<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="table_dr" class="collapse collapse-level-1">
              <li>
                <a href="#">Optie 1</a>
              </li>
              <li>
                <a  href="#"><span class="pull-right"><span class="label label-warning">New</span></span>Optie 2</a>
              </li>
              <li>
                <a  href="#"><span class="pull-right"><span class="label label-warning">Update</span></span>Optie 3</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>


<!--
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <img id="logo" src="{{ asset('img/A_logo_RGB_123x123.jpg') }}">
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                
                @if (Auth::guest())
                  <li><a href="{{ route('register') }}">Registratiepagina</a></li>
                  <li><a href="{{ route('login') }}">Inloggen</a></li>
                @else
                  <li><a href="{{ url('/profiel') }}">Profielpagina</a></li>
                  @if (Auth::user()->rol_id == 1)
                    <li><a href="{{ url('/admin') }}">Administratie</a></li>
                  @endif
                  <li><a href="{{ route('logout') }}">Afmelden</a></li>
                @endif
                
              </ul>
            </div><!--/.nav-collapse -->
   <!--       </div>
       </nav>
-->

        <div class="page-wrapper">
          @yield('admincontent')
        </div>
        <!--
        <div class="footer ">
          <table class="inhoud container">
            <tr>
              <td class="footerRechts footerTop">
                GROTE MARKT 15
              </td>
              <td class="footerLinks footerTop">
                TEL +32 3 234 98 76
              </td>
            </tr>
            <tr>  
              <td class="footerRechts footerOnder">
                2000 ANTWERPEN
              </td>
              <td class="footerLinks footerOnder">
                <a>INFO@HANDLEIDING.BE</a>
              </td>
            </tr>
          </table>
        </div>
-->




      <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>


      <script src="{{ asset('dist/js/init.js') }}"></script>
      <script src="{{ asset('dist/js/dashboard-data.js') }}"></script>


       <!--@yield('content')-->
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/admin.js') }}"></script>


      <!--table-->
      <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('vendors/bower_components/editable-table/mindmup-editabletable.js') }}"></script>
      <script src="{{ asset('vendors/bower_components/editable-table/numeric-input-example.js') }}"></script>
      <script src="{{ asset('dist/js/editable-table-data.js') }}"></script>
      <!---->

<!-- VANAF HIER TEST -->
          <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
  <!-- Data table JavaScript -->
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/pdfmake/build/pdfmake.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/pdfmake/build/vfs_fonts.js') }}"></script>
  
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('dist/js/export-table-data.js') }}"></script>

    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script> 

    <!-- Bootstrap Core JavaScript --><!--
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
  <!-- Data table JavaScript --><!--
  <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  
  <!-- Slimscroll JavaScript --><!--
  <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
  
  <!-- simpleWeather JavaScript --><!--
  <script src="{{ asset('vendors/bower_components/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('dist/js/simpleweather-data.js') }}"></script>
  
  <!-- Progressbar Animation JavaScript --><!--
  <script src="{{ asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/Counter-Up/jquery.counterup.min.js') }}"></script>
  
  <!-- Fancy Dropdown JS --><!--
  <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
  
  <!-- Sparkline JavaScript --><!--
  <script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>
  
  <!-- ChartJS JavaScript --><!--
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  
  <!-- Morris Charts JavaScript --><!--
    <script src="{{ asset('vendors/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('dist/js/morris-data.js') }}"></script>
  
  <script src="{{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
  
  <!-- Init JavaScript --><!--
  <script src="{{ asset('dist/js/init.js') }}"></script>
  <script src="{{ asset('dist/js/dashboard-data.js') }}"></script>
-->
    </body>
</html>

@endsection
