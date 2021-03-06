<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Antwerpen studentenstad</title>


        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <link rel="stylesheet" href="https://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" >

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
              <img class="logo" src="{{ asset('img/A_logo_RGB_123x123.jpg') }}">
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="#">Atypisch</a></li>
                <li><a href="#about">Studeren</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Praktisch<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Vervoer</a></li>
                    <li><a href="#">Fuiven</a></li>
                    <li><a href="#">Parken</a></li>
                    <li><a href="#">Sport</a></li>
                    <li><a href="#">Op kot</a></li>
                  </ul>
                </li>
                <li><a href="#contact">Verhalen</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                @if (Auth::guest())
                
                <ul class="dropdown-menu">
                  <ul><a href="{{ route('login') }}">Inloggen</a></ul>
                  <ul><a href="{{ route('register') }}">Registratiepagina</a></ul>
                @else
                <ul class="dropdown-menu">
                  <li><a href="{{ url('/profiel') }}">Profielpagina</a></li>
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
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('js/slideshow.js') }}"></script>
    </body>
</html>
