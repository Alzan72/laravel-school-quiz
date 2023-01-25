
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
           
            <form action="create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <label for="">Lesson</label> <br>
                  <input type="text" name="lesson" class="form-control">
                </div>
              
                <input type="hidden" value="{{ Auth::user()->id }}" name="user">
                 
                <input type="hidden" name="group"
                @foreach ( $group as $g )
                value=" {{ $g->user_id==Auth::user()->id ? $g->id : '' }}"
                @endforeach >
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection

{{-- {{ $g->user_id==Auth::user()->id ? 'selected' : '' }} --}}