@extends('student.layout-copy')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h4>{{ $ex->name }}</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <td>NO</td>
                            <td>Nama</td>
                            <td>Hasil</td>
                        </tr>
                    </thead>
              <tbody>
    @foreach ($rep as $user_id => $val )
     @php 
         $p=0;
         foreach($val as $v){
             $ans=$an->where('quizzes_id',$v->quizzes_id)->first();
             if($ans->answer==$v->reply) {
               $p+=$ex->point;
           }
       }
    @endphp
        <tr>
            <td></td>
            <td>{{ $user->where('id',$user_id)->first()->name }}</td>
        <td>{{ $p }}</td>
        </tr>
    @endforeach
</tbody>

                </table>
            </div>
        </div>
    </div>
@endsection


