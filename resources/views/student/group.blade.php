@extends('student.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Total</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="/group/{{ $item->id }}">{{ $item->group_name }}</a></td>
                        <td>{{ $item->students->count() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

    
@endsection