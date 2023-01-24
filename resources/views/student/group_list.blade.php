@extends('student.layout')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@elseif (session()->has('error'))
<div class="alert alert-warning">
{{ session()->get('error') }}
    </div>
@endif 

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Number</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Photo</td>
                    <td>Action</td>
                </tr>
                </thead>
                <form action="/student/remove" method="post">
                <tbody>
                    @foreach ($post->students as $item)
                    <tr>
                        @csrf
                        <td><input type="checkbox" value="{{ $item->id }},{{ $item->photo }}" name="remove[]" id=""></td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->number }}</td>
                         <td>{{ $item->name}}</td>     
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->phone}}</td>
                        <td><img src="/Student/img/{{ $item->photo }}" width="50px" height="50px" alt=""></td>
                        <td><a href="/student/edit/{{ $item->id }}" class="btn btn-success">Edit</a></td>
                   </tr>
                   @endforeach
                </tbody>
                <button class="btn btn-danger">Delete</button>
            </form>
            </table>
            </div>
        </div>
    </div>

    
@endsection