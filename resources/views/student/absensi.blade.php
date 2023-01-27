@extends('student.layout-copy');

@section('content')

<div class="container">
   
    <div class="row">
        <div class="col">
            <a href="{{ route('presence.create') }}" class="btn btn-primary">Add Absensi</a>
            <table class="table">
                <thead>
                    <tr>
                        <td>Lesson</td>
                        <td>Start At</td>
                        <td>End At</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $sch )
                    <tr>
                        <td>
                         @if ( $sch->schedule)
                         <a href="/presence/lesson/{{ $sch->schedule->id  }}">
                        {{ $sch->schedule->lesson->name }}
                    </a>
                        @else Tidak ada
                        @endif
                        </td>
                        <td> @if ( $sch->schedule)
                        {{ $sch->schedule->lesson->start }} @else Tidak ada
                        @endif
                    </td>
                        <td>
                            @if ( $sch->schedule)
                        {{ $sch->schedule->lesson->end }} @else Tidak ada
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection