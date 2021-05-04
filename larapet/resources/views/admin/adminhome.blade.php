@extends('layouts.app')

<!-- Left Side Of Navbar --> line (around line 35) in the app.blade.php file:
<!-- Left Side Of Navbar -->
@section('nav')
<ul class="navbar-nav mr-auto">
    @guest
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/animals') }}">Display Animals </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/animals/create') }}"> Add a new Animal </a>
    </li>

    <li><a class="nav-link" href="{{route('view_status')}}">View Statuses</a> </li>
    <li><a class="nav-link" href="{{route('view_requests')}}">View all Requests</a> </li>
    @endguest
</ul>
@endsection