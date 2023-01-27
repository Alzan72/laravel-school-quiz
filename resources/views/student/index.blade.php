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
    <a href="/student/add" class="btn btn-primary">Add Data</a>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>ID</td>
                            <td>Number</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>Group</td>
                            <td>Photo</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        <form action="/student/remove" method="post">
                    @foreach ($post as $item )
                        <tr>
                            {{-- $item->group->group_name --}}
                                @csrf
                            <td><input type="checkbox" value="{{ $item->id }},{{ $item->photo }}" name="remove[]" id=""></td>    
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if ($item->group)
                                    {{ $item->group->group_name }} @else Tidak ada
                                @endif
                            </td>
                            <td><img src="/Student/img/{{ $item->photo }}" width="50px" height="50px" alt="">
                            </td>
                            <td><a href="edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                            {{-- <a href="/student/remove/{{ $item->id }}" class="btn btn-danger">Remove</a> --}}
                            </td>
                            
                        </tr>
                    @endforeach
                    <br><button class="btn btn-danger" onclick="confirm('Are you sure want to delete this data?')">Remove</button>
                        </form>
                </tbody>

                </table>
            </div>
        </div>
    </div>
    @endsection