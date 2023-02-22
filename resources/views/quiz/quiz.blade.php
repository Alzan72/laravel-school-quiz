@extends('student.layout-copy')


@section('content')
    <div class="container">
        <div class="row">
    

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="/group/quiz/{{ $grouped->id }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Group name </th><td>{{ $grouped->group_name }}  </td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card">
                            @foreach ( $quiziz as $quiz )
                            <div class="card-header">{{ $quiz->question }}</div>
                            <div class="card-body">
                                <input type="radio" name="answer"><span>{{ $quiz->answer1 }}</span><br>
                                <input type="radio" name="answer"><span>{{ $quiz->answer2 }}</span><br>
                                <input type="radio" name="answer"><span>{{ $quiz->answer3 }}</span><br>
                                <input type="radio" name="answer"><span>{{ $quiz->answer4 }}</span>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
