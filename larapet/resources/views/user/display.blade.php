@extends('layouts.app')
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
@section('content')
<div class="container">
  <div class="row justify-content-center">
    @foreach($animals as $animal)
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" src="{{ asset('storage/images/'.$animal->image)}}" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Name:{{$animal->name}}<br></p>
            <p class="card-text">Age:{{$animal->age}}<br></p>
            <div class="d-flex justify-content-between align-items-center">
              <form action="{{route('request.adoption') }}" method="POST">
                @csrf
                <input type="hidden" name="animal_id" value="{{$animal['id']}}">
                <input type="hidden" name="animal_name" value="{{$animal['name']}}">
                <button class="btn btn-primary">Adopt</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
</div>
@endsection