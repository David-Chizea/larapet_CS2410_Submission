@extends('layouts.app')
<!-- define the content section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Edit Animal</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif

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

                <!-- define the form -->
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('animals.update', ['animal' =>$animal['id']]) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="col-md-8">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" />
                        </div>
                        <div class="col-md-8">
                            <label>Age</label>
                            <input type="text" name="age" placeholder="Age" />
                        </div>
                        <div class="col-md-8">
                            <label>Species</label>
                            <select name="species">
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Sex</label>
                            <select name="sex">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Breed</label>
                            <input type="text" name="breed" placeholder="Breed" />
                        </div>
                        <div class="col-md-8">
                            <label>Description</label>
                            <textarea rows="4" cols="50" name="description"> Some info about the animal. </textarea>
                        </div>
                        <div class="col-md-8">
                            <label>Image</label>
                            <input type="file" name="image" placeholder="Image file" />
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" />
                            <input type="reset" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection