@extends('student.layout-copy')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Quiz</div>
                    <div class="card-body">
                        <a href="/group/quiz/{{ $group->id }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ url('/quiz/quiz') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
                                <label for="group_id" class="control-label">{{ 'Group' }}</label> <span>: {{ $group->group_name }}</span>
                                <input class="form-control" name="group_id" type="hidden" id="group_id" value="{{ $group->id }}" readonly>
                                {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
                                <label for="number" class="control-label">{{ 'Number' }}</label>
                                <input class="form-control" name="number" type="number" id="number" value="{{ isset($quiz->number) ? $quiz->number : ''}}" >
                                {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
                                <label for="question" class="control-label">{{ 'Question' }}</label>
                                <textarea class="form-control" rows="5" name="question" type="textarea" id="question" >{{ isset($quiz->question) ? $quiz->question : ''}}</textarea>
                                {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('answer1') ? 'has-error' : ''}}">
                                <label for="answer1" class="control-label">{{ 'Answer1' }}</label>
                                <input type="radio" id="answer" name="answer">
                                <textarea class="form-control answer" rows="5" name="answer1" type="textarea" id="answer1" >{{ isset($quiz->answer1) ? $quiz->answer1 : ''}}</textarea>
                                {!! $errors->first('answer1', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('answer2') ? 'has-error' : ''}}">
                                <label for="answer2" class="control-label">{{ 'Answer2' }}</label>
                                <input type="radio" id="answer" name="answer">
                                <textarea class="form-control  answer" rows="5" name="answer2" type="textarea" id="answer2" >{{ isset($quiz->answer2) ? $quiz->answer2 : ''}}</textarea>
                                {!! $errors->first('answer2', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('answer3') ? 'has-error' : ''}}">
                                <label for="answer3" class="control-label">{{ 'Answer3' }}</label>
                                <input type="radio" id="answer" name="answer">
                                <textarea class="form-control  answer" rows="5" name="answer3" type="textarea" id="answer3" >{{ isset($quiz->answer3) ? $quiz->answer3 : ''}}</textarea>
                                {!! $errors->first('answer3', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('answer4') ? 'has-error' : ''}}">
                                <label for="answer4" class="control-label">{{ 'Answer4' }}</label>
                                <input type="radio" id="answer" name="answer">
                                <textarea class="form-control answer" rows="5" name="answer4" type="textarea" id="answer4" >{{ isset($quiz->answer4) ? $quiz->answer4 : ''}}</textarea>
                                {!! $errors->first('answer4', '<p class="help-block">:message</p>') !!}
                            </div>
                            
                          <button class="btn btn-success">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="{{ asset('Student/JS/quiz.js') }}"></script>