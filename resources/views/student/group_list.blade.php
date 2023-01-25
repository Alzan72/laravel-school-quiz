@extends('student.layout-copy')

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
           
            <form action="/group/add_member" method="post" class="form-control">
                @csrf
                <input type="hidden" value="{{ $post->id }}" name="group">
            <label for="">Add Student</label>
            <select name="student" id="" class="form-control">
                <option value="">Chosee Student</option>
                @foreach ($student as $st)
                    <option value="{{ $st->id }}">{{ $st->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary">Add</button>
            </form><br>
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
                
                <tbody>
                    @foreach ($post->students as $item)
                    <tr>
               
                        
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
               
            </table>
            </div>
        </div>
    </div>

    
@endsection