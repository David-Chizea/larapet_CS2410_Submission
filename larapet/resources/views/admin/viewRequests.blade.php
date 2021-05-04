@extends('layouts.app')
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

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Display all Animals</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserID</th>
                                <th>AnimalID</th>
                                <th>Animal Name</th>
                                <th>Status</th>


                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adoptions as $adoption)
                            <tr>
                                <td>{{$adoption['id']}}</td>
                                <td>{{$adoption['user_id']}}</td>
                                <td>{{$adoption['animal_id']}}</td>
                                <td>{{$adoption['animal_name']}}</td>
                                <td>{{$adoption['status']}}</td>
                                <td>
                                    <button type="submit" class="default-btn floatright"><a href="{{route('approve_requests',$adoption['id'])}}"> Approve</a></button>
                                </td>
                                <td>
                                    <button type="submit" class="default-btn floatright"><a href="{{route('deny_requests',$adoption['id'])}}"> Deny</a></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection