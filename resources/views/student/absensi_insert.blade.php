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

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<div class="container">
    <form action="{{ route('presence.store') }}" method="post">
        @csrf
        @if ($schedule)
            @foreach ($schedule as $s)
                <input type="hidden" name="schedule" value="{{ $s->id }}">
                <h5>Pengajar : {{ $s->user->name }}</h5>
                <h5>Jadwal : {{ $s->lesson->name }}</h5>
                <h5>Jam KBM : {{ $s->lesson->start }} - {{ $s->lesson->end }}</h5>
            @endforeach
            @else
            <h5>Tidak ada jadwal</h5>
            @endif
            <br>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama siswa</td>
                    <td>Status</td>
                    <td>Keterangan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ( $student as $stu )
                <tr>
                    <td>
                    </td>
                    <td>
                        <h6>{{ $stu->name }}</h6>
                    </td>
                    <td>
                        <label class="form-check-label  px-1" for="">Hadir</label>
                        <input class="form-check-input" type="radio" name="status[{{ $stu->id  }}]" value="Hadir">
                        <label class="form-check-label px-1" for="">Sakit</label>
                        <input class="form-check-input" type="radio"  name="status[{{$stu->id}}]" value="Sakit">
                        <label class="form-check-label px-1" for="">Izin</label>
                        <input class="form-check-input" type="radio"  name="status[{{$stu->id}}]" value="Izin">
                        <label class="form-check-label px-1" for="">Alpha</label>
                        <input class="form-check-input" type="radio" name="status[{{$stu->id}}]" value="Alpha">
                    </td>
                    <td>
                        <input type="text" name="note[{{$stu->id}}]" class="form-control" placeholder="Keterangan">
            
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table>
   
    <button class="btn btn-primary">Submit</button>
</form>
</div>

@endsection