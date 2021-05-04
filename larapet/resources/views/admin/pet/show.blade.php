@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Animal Details</div>
                <div class="card-body">
                    <table class="table table-striped" border="1">
                        <tr>
                            <td> <b>Name </th>
                            <td> {{$animal['name']}}</td>
                        </tr>
                        <tr>
                            <th>Animal Age </th>
                            <td>{{$animal->age}}</td>
                        </tr>
                        <tr>
                            <th> Species</th>
                            <td>{{$animal->species}}</td>
                        </tr>
                        <tr>
                            <td> Sex</th>
                            <td>{{$animal->sex}}</td>
                        </tr>
                        <tr>
                            <td> Breed </th>
                            <td>{{$animal->breed}}</td>
                        </tr>
                        <tr>
                            <th> About me </th>
                            <td style="max-width:150px;">{{$animal->description}}</td>
                        </tr>
                        <tr>
                            <td colspan='2'><img style="width:100%;height:100%" src="{{ asset('storage/images/'.$animal->image)}}"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><a href="{{route('animals.index')}}" class="btn btn-primary" role="button">Back to the
                                    list</a></td>
                            <td><a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btnwarning">Edit</a></td>
                            <td>
                                <form action="{{ route('animals.destroy', ['animal' => $animal['id']]) }}" method="post"> @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection