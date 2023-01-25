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
            <a href="{{ route('presence.create') }}" class="btn btn-primary">Add Schedule</a>
            <table class="table">
                <thead>
                    <tr>
                    <td>NO</td>
                    <td>Name</td>
                    <td>Status</td>
                    <td>Note</td>
                    <td>Schedule</td>
                    <td>action</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)

                    <tr>
                       <td>{{ $no++ }}</td>
                       <td>{{ $item->students->name}}</td>
                       <td>{{ $item->status }}</td>
                       <td>{{ $item->note }}</td>
                       <td>{{ $item->schedule->lesson->name }}</td>
                        <td><a href="/schedule/edit/{{ $item->id }}" class="btn btn-success">Edit</a></td>
                        <td><a href="/schedule/delete/{{ $item->id }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection