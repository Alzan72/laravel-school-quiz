@extends('student.layout-copy')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Quiz {{ $quiz->id }}</div>
                    <div class="card-body">

                        <a href="/group/quiz/{{ $quiz->group_id }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/quiz/quiz/' . $quiz->id . '/edit') }}" title="Edit Quiz"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('quiz/quiz' . '/' . $quiz->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Quiz" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $quiz->id }}</td>
                                    </tr>
                                    <tr><th> Group Id </th><td> {{ $quiz->group_id }} </td></tr><tr><th> Number </th><td> {{ $quiz->number }} </td></tr><tr><th> Question </th><td> {{ $quiz->question }} </td></tr><tr><th> Topic </th><td> {{ $quiz->topic->topic }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card">
                            <div class="card-header">{{ $quiz->question }}</div>
                            <div class="card-body">
                                <input type="radio" name="answer" value="{{ $quiz->answer1 }}" {{ $answer=='A' ? 'checked':'' }}><span>{{ $quiz->answer1 }}</span><br>
                                <input type="radio" name="answer" value="{{ $quiz->answer2 }}" {{ $answer=='B' ? 'checked':'' }}><span>{{ $quiz->answer2 }}</span><br>
                                <input type="radio" name="answer" value="{{ $quiz->answer3 }}" {{ $answer=='C' ? 'checked':'' }}><span>{{ $quiz->answer3 }}</span><br>
                                <input type="radio" name="answer" value="{{ $quiz->answer4 }}" {{ $answer=='D' ? 'checked':'' }}><span>{{ $quiz->answer4 }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
