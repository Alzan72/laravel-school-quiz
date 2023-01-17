@extends('student.layout')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif

<div class="container">
    <a href="/student/add" class="btn btn-primary">Add Data</a>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Number</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>Photo</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($post as $item )
                        <tr>
                        
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td><img src="/Student/img/{{ $item->photo }}" width="50px" height="50px" alt=""></td>
                            <td><a href="/student/edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                            <a href="/student/remove/{{ $item->id }}" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
        </div>
    </div>
    @endsection