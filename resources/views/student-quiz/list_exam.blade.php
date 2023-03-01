@extends('student-quiz.layout-student')

@section('content')
    
<div class="container">
    <div class="row">
    @foreach ($exam as $ex )
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">{{ $ex->name }}</div>
            <div class="card-body">
                <ul>
                    <li>Pengajar: {{ $ex->group->user->name }}</li>
                    <li>Mulai: {{ $ex->start }}</li>
                    <li>Selesai: {{ $ex->end }}</li>
                </ul>
                <a href="/exam/{{ $ex->id }}/prepare" class="btn btn-success btn-sm">Mulai tes</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>


@endsection