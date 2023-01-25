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
                    <select name="lesson" id="" class="form-select">
                        <option value="">Choose lesson</option>
                        @foreach ($lesson as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="row">
                    <label for="">Dosen</label> <br>
                    <select name="user" id="" class="form-select">
                        <option value="">Choose dosen</option>
                        @foreach ($group as $item)
                            <option value="{{ $item->id }}">{{ $item->user_id }}</option>
                        @endforeach
                    </select>
                </div> --}}
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user">
                    @foreach( $group as $g )
                    @if($g->user_id == Auth::user()->id)
                        <input type="hidden" name="group" value="{{ $g->id }}">
                    @endif
                @endforeach             
                {{-- <div class="row">
                    <label for="">Group</label> <br>
                   <select name="group" id="" class="form-select" >
                    <option value="">Choose Group...</option>
                    @foreach ( $group as $g )
                    <option value="{{ $g->id }}" >{{ $g->group_name }}</option>
                    @endforeach
                   </select>
                </div> --}}
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection

{{-- {{ $g->user_id==Auth::user()->id ? 'selected' : '' }} --}}