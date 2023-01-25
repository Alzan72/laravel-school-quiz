@extends('student.layout-copy')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/group/add" class="btn btn-primary">Add group</a>
            <table class="table">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Total</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="/group/{{ $item->id }}">{{ $item->group_name }}</a></td>
                        <td>{{ $item->students->count() }}</td>
                        <td>
                        <a href="group/edit/{{ $item->id }}" class="btn btn-primary">Edit<a> 
                        <a href="group/delete/{{ $item->id }}" class="btn btn-danger">Delete<a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

    
@endsection