<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label><span>: {{ $quiz->group->group_name }}</span>
    <input class="form-control" name="group_id" type="hidden" id="group_id" value="{{ isset($quiz->group_id) ? $quiz->group_id : ''}}" >
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
    <input type="radio" id="answer" name="answer" value="{{ $quiz->answer1 }}" {{ $quiz->answer1==$answer ? 'checked':'' }}>
    <textarea class="form-control" rows="5" name="answer1" type="textarea" id="answer1" >{{ isset($quiz->answer1) ? $quiz->answer1 : ''}}</textarea>
    {!! $errors->first('answer1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer2') ? 'has-error' : ''}}">
    <label for="answer2" class="control-label">{{ 'Answer2' }}</label>
    <input type="radio" id="answer" name="answer" value="{{ $quiz->answer2 }}" {{ $quiz->answer2==$answer ? 'checked':'' }}>
    <textarea class="form-control" rows="5" name="answer2" type="textarea" id="answer2" >{{ isset($quiz->answer2) ? $quiz->answer2 : ''}}</textarea>
    {!! $errors->first('answer2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer3') ? 'has-error' : ''}}">
    <label for="answer3" class="control-label">{{ 'Answer3' }}</label>
    <input type="radio" id="answer" name="answer" value="{{ $quiz->answer3 }}" {{ $quiz->answer3==$answer ? 'checked':''  }}>
    <textarea class="form-control" rows="5" name="answer3" type="textarea" id="answer3" >{{ isset($quiz->answer3) ? $quiz->answer3 : ''}}</textarea>
    {!! $errors->first('answer3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer4') ? 'has-error' : ''}}">
    <label for="answer4" class="control-label">{{ 'Answer4' }}</label>
    <input type="radio" id="answer" name="answer" value="{{ $quiz->answer4 }}" {{ $quiz->answer4==$answer ? 'checked':'' }}>
    <textarea class="form-control" rows="5" name="answer4" type="textarea" id="answer4" >{{ isset($quiz->answer4) ? $quiz->answer4 : ''}}</textarea>
    {!! $errors->first('answer4', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
