@extends('student.layout-copy')

@section('content')


<div class="container">
    <div class="row">
        <div class="col">
            <form action="/user/update" method="post">
            <label for="user">Username</label><br>
            <input type="text" name="username" value="{{ $user->name }}" class="form-control">
            <label for="group">Group</label><br>
                <select name="group" id="" class="form-control">
                    <option value="">Chosee group</option>
                    @if ($user->group)
                        @foreach ($group as $g )
                            <option value="{{ $g->id }}" {{ $g->user_id==$user->id?'selected':'' }}>{{ $group->group_name }}</option>
                        @endforeach
                    @endif
                </select>
            </form>
        </div>
    </div>
</div>
    
@endsection


    