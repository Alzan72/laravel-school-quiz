@extends('student.layout-copy')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Group</td>
                    <td>User</td>
                    <td>Schedule</td>
                    <td>Star</td>
                    <td>End</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->group->group_name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->schedule }}</td>
                        <td>{{ $item->start_at }}</td>
                        <td>{{ $item->end_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection