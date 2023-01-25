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
           
            <form action="/article/update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $post->id }}" id="">
                <div class="row">
                    <label for="">Title</label><br>
                    <input type="text" name="title" value="{{ $post->title }}" id="" class="form-control">
                </div>
                <div class="row">
                    <label for="">Content</label> <br>
                    <input type="text" name="content" value="{{ $post->content }}" class="form-control">
                </div>
                <div class="row">
                    <label for="">Photo</label> <br>
                    <input type="file" name="img" class="form-control">
                </div>
                <input type="hidden" name="img_old" value="{{ $post->img }}">
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection