@extends('student.layout')

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
           
            <form action="/Update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $id->id }}" name="id">
                <div class="row">
                    <label for="">Number</label><br>
                    <input type="number" name="number" value="{{ $id->number }}" id="" class="form-control">
                </div>
                <div class="row">
                    <label for="">Name</label> <br>
                    <input type="text" name="name"value="{{ $id->name }}" class="form-control">
                </div>
                <div class="row">
                    <label for="">Phone</label> <br>
                    <input type="number" name="phone"value="{{ $id->phone }}" class="form-control">
                </div>
                <div class="row">
                    <label for="">Email</label> <br>
                    <input type="email" name="email" value="{{ $id->email }}" class="form-control">
                </div>
                <div class="row">
                    <div class="col">
                    <label for="">Photo</label> <br>
                    <input type="file" name="photo" value="{{ $id->photo }}" class="form-control"><br>
                    <img src="/Student/img/{{ $id->photo }}" width="80px" height="80px" alt="">
                    <input type="hidden" name="old_photo" value="{{ $id->photo }}">
                </div>
                </div>

                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection