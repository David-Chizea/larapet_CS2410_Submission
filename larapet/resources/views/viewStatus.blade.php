@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> id</th>
                                <th> User-id</th>
                                <th> Animal Name</th>
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adoptions as $adoption)
                            <tr>
                            <td> {{$adoption->id}} </td>
                                <td> {{$adoption->user_id}} </td>
                                <td> {{$adoption->animal_name}} </td>
                                <td> {{$adoption->status}} </td>
                                
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