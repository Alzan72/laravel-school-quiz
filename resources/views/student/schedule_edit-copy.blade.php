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
           
            <form action="/schedule/update" method="POST" enctype="">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $post->id }}" name="id">
                <div class="row">
                    <label for="">Lesson</label> <br>
                  <input type="text" value="{{ $post->schedule_id }}" name="lesson">
                </div>
                <div class="row">
                    <label for="">Dosen</label> <br>
                    <select name="user" id="" class="form-select" disabled>
                        <option value="">Choose dosen</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $post->user_id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <label for="">Group</label> <br>
                   <select name="group" id="" class="form-select" disabled>
                    <option value="">Choose Group...</option>
                    @foreach ( $group as $g )
                        <option value="{{ $g->id }}" {{ $g->id == $post->group_id ? 'selected' : '' }}>{{ $g->group_name }}</option>
                    @endforeach
                   </select>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection