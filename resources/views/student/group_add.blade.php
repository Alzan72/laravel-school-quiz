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
           
            <form action="create" method="POST" enctype="">
                {{ csrf_field() }}
                <div class="row">
                    <label for="">Group</label> <br>
                    <input type="text" class="form-control" placeholder="Group name" name="group">
                </div>
                <div class="row">
                    <label for="">Dosen</label> <br>
                    <select name="user" id="" class="form-select">
                        <option value="">Choose dosen</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection