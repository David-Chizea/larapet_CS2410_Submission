@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @section('nav')
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user/display') }}">All Animals</a>

                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{route('view_status')}}">View Request</a>

                    </li>
                    </ul>
                    
                    @endsection

                </div>
            </div>
        </div>
    </div>
</div>
@endsection