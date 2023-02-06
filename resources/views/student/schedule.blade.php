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
            <a href="/schedule/add" class="btn btn-primary">Add Schedule</a>
            <table class="table">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Group</td>
                    <td>User</td>
                    <td>Lesson</td>
                    <td>Star</td>
                    <td>End</td>
                    <td>action</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                         @if ($item->group)
                            {{ $item->group->group_name }}
                        @else
                            Tidak ada
                        @endif
                    </td>
                        <td>
                            @if ($item->user)
                                {{ $item->user->name }}
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            @if ($item->lesson)
                                {{ $item->lesson->name }}
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            @if ($item->lesson)
                                {{ $item->lesson->start }}
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            @if ($item->lesson)
                                {{ $item->lesson->end }}
                            @else
                                Tidak ada
                            @endif
                        </td>
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