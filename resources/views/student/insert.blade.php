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
           
            <form action="Create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <label for="">Number</label><br>
                    <input type="number" name="number" id="" class="form-control">
                </div>
                <div class="row">
                    <label for="">Name</label> <br>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="row">
                    <label for="">Phone</label> <br>
                    <input type="number" name="phone" class="form-control">
                </div>
                <div class="row">
                    <label for="">Email</label> <br>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="row">
                    <label for="">Group</label> <br>
                   <select name="group" id="" class="form-select">
                    <option value="">Choose Group...</option>
                    @foreach ( $group as $g )
                        <option value="{{ $g->id }}">{{ $g->group_name }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="row">
                    <label for="">Photo</label> <br>
                    <input type="file" name="photo" class="form-control">
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection