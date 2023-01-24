@extends('student.layout')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/user/add">Add User</a>
            <table class="table">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Group</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->group->group_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>


@endsection