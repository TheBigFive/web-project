<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Antwerpen studentenstad</title>


        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/font.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sticky-footer.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="{{ url('/') }}">
                <img alt='logo' class="logo" src="{{ asset('img/A_logo_RGB_123x123.jpg') }}">
              </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('bezienswaardigheden') }}">Bezienswaardigheden</a></li>
                <li><a href="{{ url('scholen') }}">Studeren</a></li>
                <li class="dropdown">
                  <a href="{{ url('praktisch') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Praktisch<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('praktisch') }}#vervoer">Vervoer</a></li>
                    <li><a href="{{ url('praktisch') }}#fuiven">Fuiven</a></li>
                    <li><a href="{{ url('praktisch') }}#parken">Parken</a></li>
                    <li><a href="{{ url('praktisch') }}#sport">Sport</a></li>
                    <li><a href="{{ url('praktisch') }}#kot">Op kot</a></li>
                  </ul>
                </li>
                <li><a href="{{ url('testimonials') }}">Verhalen</a></li>
                <li><a href="{{ url('nieuwsartikels') }}">Nieuws</a></li>
                <li><a href="{{ url('spel') }}"><i class="fa fa-gamepad" aria-hidden="true"></i></a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="caret"></span></a>
                @if (Auth::guest())
                
                <ul class="dropdown-menu">
                  <ul><a href="{{ route('login') }}">Inloggen</a></ul>
                  <ul><a href="{{ route('register') }}">Registreer</a></ul>
                @else
                <ul class="dropdown-menu">
                  <li><a href="{{ url('/profiel') }}">Aangemeld als <div id="aangemeldAccount">{{ Auth::user()->voornaam }}</div></a></li>
                  @if (Auth::user()->rol_id == 1 ||Auth::user()->rol_id == 3 || Auth::user()->rol_id == 4)
                    <li><a href="{{ url('/admin') }}">Administratie</a></li>
                  @endif
                  <li><a href="{{ route('logout') }}">Afmelden</a></li>
                  </ul>
                @endif
                
              </ul>
              </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

        @yield('content')
        
        <div class="footer">
          <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
              <p>GROTE MARKT 15</p>
              <p>2000 ANTWERPEN</p>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
              <p>TEL +32 3 234 98 76</p>
              <a>INFO@HANDLEIDING.BE</a>
            </div>
          </div>
    </body>
        <script src="{{ asset('js/slideshow.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
        <script src="{{ asset('js/datumFirefox.js') }}"></script>
</html>