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
        <select name="schedule" id="" class="form-control">
            <option value="">Pilih jadwal</option>
            @foreach ($schedule as $s)
                <option value="{{ $s->id }}">{{ $s->lesson->name }}</option>
            @endforeach
        </select><br>
    @foreach ( $student as $stu )
    <div class="row p-1">
        <div class="col">
            <h6>{{ $stu->name }}</h6>
        </div>
        <div class="col">
            <label class="form-check-label  px-1" for="">Hadir</label>
            <input class="form-check-input" type="radio" name="status[{{ $stu->id  }}]" value="Hadir">
            <label class="form-check-label px-1" for="">Sakit</label>
            <input class="form-check-input" type="radio"  name="status[{{$stu->id}}]" value="Sakit">
            <label class="form-check-label px-1" for="">Izin</label>
            <input class="form-check-input" type="radio"  name="status[{{$stu->id}}]" value="Izin">
            <label class="form-check-label px-1" for="">Alpha</label>
            <input class="form-check-input" type="radio" name="status[{{$stu->id}}]" value="Alpha">
        </div>
        <div class="col">
            <input type="text" name="note[{{$stu->id}}]" class="form-control" placeholder="Keterangan">

        </div>
    </div>   
    @endforeach
    <button class="btn btn-primary">Submit</button>
</form>
</div>

@endsection