@extends('student.layout-copy')
{{-- @extends('layouts.app') --}}

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
    <a href="/article/add" class="btn btn-primary">Add Data</a>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Content</td>
                            <td>Photo</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                      
                    @foreach ($post as $item )
                        <tr>
                            
                                @csrf 
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content}}</td>
                            <td><img src="/Student/img/{{ $item->img }}" width="50px" height="50px" alt="">
                            </td>
                            <td><a href="/article/edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                            <a href="/article/remove/{{ $item->id }}" class="btn btn-danger">Remove</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
        </div>
    </div>
    @endsection