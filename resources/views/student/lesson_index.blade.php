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
    <a href="{{ route('lesson.create') }}" class="btn btn-primary">Add Data</a>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>ID</td>
                            <td>Lesson</td>
                            <td>Start</td>
                            <td>End</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="post">
                    @foreach ($post as $item )
                        <tr>
                            
                                @csrf
                            <td><input type="checkbox" value="{{ $item->id }}" name="remove[]" id=""></td>    
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->start }}</td>
                            <td>{{ $item->end }}</td>
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