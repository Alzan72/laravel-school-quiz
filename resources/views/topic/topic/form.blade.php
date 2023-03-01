<div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">{{ 'Topic' }}</label>
    <input class="form-control" name="topic" type="text" id="topic" value="{{ isset($topic->topic) ? $topic->topic : ''}}" >
    {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
