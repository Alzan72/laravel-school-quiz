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
        <div class="col">
           
            <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <label for="">Name</label> <br>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="row">
                    <label for="">Start At</label> <br>
                    <input type="time" name="start_at" class="form-control">
                </div>
                <div class="row">
                    <label for="">End At</label> <br>
                    <input type="time" name="end_at" class="form-control">
                </div>
                
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection