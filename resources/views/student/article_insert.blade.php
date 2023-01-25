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
           
            <form action="/article/create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <label for="">Title</label><br>
                    <input type="text" name="title" id="" class="form-control">
                </div>
                <div class="row">
                    <label for="">Content</label> <br>
                    <input type="text" name="content" class="form-control">
                </div>
                <div class="row">
                    <label for="">Photo</label> <br>
                    <input type="file" name="img" class="form-control">
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection