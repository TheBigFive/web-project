@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Registratiepagina</h1>
    <form role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
      
      <div class="form-group{{ $errors->has('voornaam') ? ' has-error' : '' }}">
        <label>Voornaam</label>

        <input type="text" class="form-control" name="voornaam" value="{{ old('voornaam') }}" placeholder="Typ hier je voornaam">

        @if ($errors->has('voornaam'))
          <span class="help-block">
            <strong>{{ $errors->first('voornaam') }}</strong>
          </span>
        @endif

      </div>

      <div class="form-group{{ $errors->has('achternaam') ? ' has-error' : '' }}">
        <label>Achternaam</label>

        <input type="text" class="form-control" name="achternaam" value="{{ old('achternaam') }}" placeholder="Typ hier je achternaam">

        @if ($errors->has('achternaam'))
          <span class="help-block">
            <strong>{{ $errors->first('achternaam') }}</strong>
          </span>
        @endif

      </div>

      <div class="form-group{{ $errors->has('geboortedatum') ? ' has-error' : '' }}">
        <label>Geboortedatum</label>

        <input type="date" class="form-control" name="geboortedatum" value="{{ old('geboortedatum') }}" placeholder="Typ hier je geboortedatum">

        @if ($errors->has('geboortedatum'))
          <span class="help-block">
            <strong>{{ $errors->first('geboortedatum') }}</strong>
          </span>
        @endif

      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label>E-Mail</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Typ hier je E-mail">
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label>Wachtwoord</label>
        <input type="password" class="form-control" name="password" placeholder="Typ je wachtwoord">

        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label>Bevestig Wachtwoord</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Typ je wachtwoord opnieuw">

        @if ($errors->has('password_confirmation'))
          <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
        @endif

      </div>

      <div class="form-group">
          <input type="submit" value="Registreren" class="btn btn-primary btn-block"/>
      </div>
      <div class="form-group">
        <a href="{{ url('/login') }}">Al een account? Log hier in</a>
      </div>
    </form>         
  </div>
@endsection