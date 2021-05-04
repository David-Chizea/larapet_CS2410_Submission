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

                                <th>Animal-ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Species</th>
                                <th>Sex</th>
                                <th>Breed</th>
                                <th>Action</th>

                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($animals as $animal)
                            <tr>
                                <td>{{$animal['id']}}</td>
                                <td>{{$animal['name']}}</td>
                                <td>{{$animal['age']}}</td>
                                <td>{{$animal['species']}}</td>
                                <td>{{$animal['sex']}}</td>
                                <td>{{$animal['breed']}}</td>

                                <td><a href="{{route('animals.show', ['animal' => $animal['id'] ] )}}" class="btn btnprimary">Details</a></td>
                                <td><a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btnwarning">Edit</a></td>
                                <td>
                                    <form action="{{route('animals.destroy', ['animal' => $animal['id'] ])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit"> Delete</button>
                                    </form>
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