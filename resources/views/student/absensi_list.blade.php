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
            <a href="/presence" class="btn btn-danger"><- Back</a>
            <a href="{{ route('presence.create') }}" class="btn btn-primary">Add absensi</a>
            <table class="table">
                <thead>
                    <tr>
                    <td>NO</td>
                    <td>Name</td>
                    <td>Status</td>
                    <td>Note</td>
                    <td>Schedule</td>
                    <td>action</td>
                    <td>Time</td>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach ( $post as $item )
                        
               
                    <tr>
                       <td>{{ $no++ }}</td>
                       <td> @if ( $item->students)
                        {{ $item->students->name}} @else Tidak ada
                       @endif
                       </td>
                       <td>{{ $item->status }}</td>
                       <td>{{ $item->note }}</td>
                       <td>
                        @if ( $item->schedule)
                        {{ $item->schedule->lesson->name }} 
                        @else 
                        Tidak ada
                        @endif
                       </td>
                        <td><a href="/presence/edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('presence.destroy',[$item->id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection