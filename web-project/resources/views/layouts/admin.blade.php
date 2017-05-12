@extends('layouts.app')

@section('content')
  <div class="container admin-container">
      <div class="row">
        <div class="admin-title">
          <h1>Adminpaneel</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 admin-menu">
          <div class="list-group">
            <a href="{{ url('/admin') }}" class="list-group-item">Dashboard</a>
            <a href="{{ url('/admin/gebruikers') }}" class="list-group-item">Gebruikers</a>
            <a href="#" class="list-group-item">Nieuwsitems</a>
            <a href="#" class="list-group-item">Testimonials</a>
            <a href="#" class="list-group-item">Bezienswaardigheden</a>
            <a href="#" class="list-group-item">Scholen</a>
            <a href="#" class="list-group-item">Stadsinformatie</a>
          </div>
        </div>
        <div class="col-md-9 admin-content">
          @yield('admincontent')
        </div>
      </div>
    </div>
@endsection
