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
    <form action="" method="post"> 
      <input type="hidden" value="{{ $post->id }}" name="id">
      <input type="hidden" value="{{ $post->schedule_id }}" name="schedule">
    
    <div class="row p-1">
        <div class="col">
          
            <h6>Nama: {{ $post->students->name }} </h6>
        </div>
        <div class="col">
            <label class="form-check-label  px-1" for="">Hadir</label>
            <input class="form-check-input" type="radio" name="status" value="Alpha" {{ $post->status=='Hadir' ? 'checked' : '' }}>

            <label class="form-check-label px-1" for="">Sakit</label>
            <input class="form-check-input" type="radio" name="status" value="Alpha" {{ $post->status=='Sakit' ? 'checked' : '' }}>

            <label class="form-check-label px-1" for="">Izin</label>
            <input class="form-check-input" type="radio" name="status" value="Alpha" {{ $post->status=='Izin' ? 'checked' : '' }}>

            <label class="form-check-label px-1" for="">Alpha</label>
            <input class="form-check-input" type="radio" name="status" value="Alpha" {{ $post->status=='Alpha' ? 'checked' : '' }}>

        </div>
        <div class="col">
            <input type="text" name="note"class="form-control" value="{{ $post->note }}" placeholder="Keterangan">

        </div>
    </div>   

    <button class="btn btn-primary">Submit</button>
</form>
</div>

@endsection