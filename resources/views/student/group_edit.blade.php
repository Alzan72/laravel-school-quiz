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
           
            <form action="/group/update" method="POST" enctype="">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="row">
                    <label for="">Group</label> <br>
                    <input type="text" class="form-control" value="{{ $post->group_name }}"placeholder="Group name" name="group">
                </div>
                <div class="row">
                    <label for="">Dosen</label> <br>
                    <select name="user" id="" class="form-select">
                        <option value="">Choose dosen</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $post->user_id ? 'selected' : '' }}>{{ $item->name }}</option>
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