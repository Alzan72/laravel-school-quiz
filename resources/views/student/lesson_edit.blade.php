@extends('student.layout-copy')

@section('content')

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
    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('lesson.update',[$post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                 <div class="row">
                     <label for="">Name</label> <br>
                     <input type="text" value="{{ $post->name }}" name="name" class="form-control">
                 </div>
                 <div class="row">
                     <label for="">Start At</label> <br>
                     <input type="time" value="{{ $post->start }}" name="start_at" class="form-control">
                 </div>
                 <div class="row">
                     <label for="">End At</label> <br>
                     <input type="time" value="{{ $post->end }}" name="end_at" class="form-control">
                 </div>
                 <button class="btn btn-primary">Submit</button>
             </form>
             
            
        </div>
    </div>
</div>


@endsection