<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Antwerpen studentenstad</title>

        
      <!--VANAF HIER VOOR KENNY-->

  
      
  
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
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" >
        

    </head>
    <body>



<div class="wrapper">
      <!-- Top Menu Items -->
     <nav class="navbar navbar-inverse navbar-fixed-top">
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a href="{{ url('/admin') }}"><img class="pull-left adminlogo" src="{{ asset('img/A_logo_RGB_123x123.jpg') }}" alt="brand"/></a>
        <ul class="nav navbar-right top-nav pull-right">
          <li class="terugtekst"><a href="{{ url('/') }}"><i class="fa fa-arrow-circle-left"></i> Terug naar de website</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><i class="fa fa-cog top-nav-icon"></i></a>
            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
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
      </nav>


  <!--LEFT NAV BAR-->

    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
          <li>
            <a  class="active" href="{{ url('/admin') }}" data-toggle="collapse" data-target="#dashboard_dr"><i class="fa fa-fw fa-home"></i> Dashboard </a>
          </li>
          <li>
            <a href="{{ url('/admin/gebruikers') }}" data-toggle="collapse" data-target="#ecom_dr"><i class="fa fa-fw fa-users"></i> Gebruikers</a>
          </li>
          <li>
            <a href="{{ url('admin/nieuwsitems') }}" data-toggle="collapse" data-target="#chart_dr"
            ><i class="fa fa-fw fa-file-text-o"></i> Nieuwsitems <span class="pull-right"></span></a>
          </li>
          <li>
            <a href="{{ url('admin/testimonials') }}" data-toggle="collapse" data-target="#chart_dr"><i class="fa fa-fw fa-comment"></i></i> Testimonials<span class="pull-right"></span></a>
          </li>
          <li>
            <a href="{{ url('admin/bezienswaardigheden') }}" data-toggle="collapse" data-target="#chart_dr"><i class="fa fa-fw fa-camera"></i> Bezienswaardigheden<span class="pull-right"></span></a>
          </li>
          <li>
            <a href="{{ url('admin/scholen') }}" data-toggle="collapse" data-target="#chart_dr"><i class="fa fa-fw fa-mortar-board"></i> Scholen </a>
          </li>
          <li>
            <a href="{{ url('admin/tags') }}" ><i class="fa fa-fw fa-hashtag"></i> Tag<span class="pull-right"></span></a>
          </li>

        </ul>
      </div>

            

        <div class="page-wrapper">  
          @yield('admincontent')
        </div>


      

      <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
      <script  type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBShkDsUqnZDbfk2mnY2zXDQgck-U0NDEo"
  ></script>
      <script src="{{ asset('dist/js/init.js') }}"></script>
      <script src="{{ asset('dist/js/dashboard-data.js') }}"></script>


       <!--@yield('content')-->
      <script src="{{ asset('js/app.js') }}"></script>
      


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
  
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('dist/js/export-table-data.js') }}"></script>

    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script> 
    
  <!-- Data table JavaScript -->
  <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  

  <!-- Fancy Dropdown JS -->
  <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
  
  
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
      
      <!-- Summernote zorgt voor toolbar in textarea's-->
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
      <script src="{{ asset('js/summernote-nl-NL.js') }}"></script>
      <!-- <script src="{{ asset('js/googlemaps.js') }}"></script> -->
      <script src="{{ asset('js/gmaps.js') }}"></script>
      <!-- Bevat summernote, tabs gebruikers -->
      <script src="{{ asset('js/admin.js') }}"></script>

    </body>
</html>