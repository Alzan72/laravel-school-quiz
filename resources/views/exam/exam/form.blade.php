<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($exam->name) ? $exam->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dekskripsi') ? 'has-error' : ''}}">
    <label for="dekskripsi" class="control-label">{{ 'Dekskripsi' }}</label>
    <textarea class="form-control" rows="5" name="dekskripsi" type="textarea" id="dekskripsi" >{{ isset($exam->dekskripsi) ? $exam->dekskripsi : ''}}</textarea>
    {!! $errors->first('dekskripsi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('topic_id') ? 'has-error' : ''}}">
    <label for="topic_id" class="control-label">{{ 'Topic Id' }}</label>
        <select name="topic_id" id="topic_id" class="form-select" required>
            <option value="">Pilih topic</option>
            @foreach ($topic as $t )
                <option value="{{ $t->id }}" {{ (isset($exam->topic_id) && $exam->topic_id == $t->id) ? 'selected' : '' }}>{{ $t->topic }}</option>
            @endforeach
        </select>
</div>
<div class="form-group {{ $errors->has('start') ? 'has-error' : ''}}">
    <label for="start" class="control-label">{{ 'Start' }}</label>
    <input class="form-control" name="start" type="datetime-local" id="start" value="{{ isset($exam->start) ? $exam->start : ''}}" required>
    {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
    <label for="end" class="control-label">{{ 'End' }}</label>
    <input class="form-control" name="end" type="datetime-local" id="end" value="{{ isset($exam->end) ? $exam->end : ''}}" required>
    {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($exam->group_id) ? $exam->group_id : $group->id}}" readonly>
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
    <label for="time" class="control-label">{{ 'Time' }}</label>
    <input class="form-control" name="time" type="number" id="time" value="{{ isset($exam->time) ? $exam->time : ''}}" required >
    {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('point') ? 'has-error' : ''}}">
    <label for="point" class="control-label">{{ 'Point' }}</label>
    <input class="form-control" name="point" type="number" id="point" value="{{ isset($exam->point) ? $exam->point : ''}}" required>
    {!! $errors->first('point', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('token') ? 'has-error' : ''}}">
    <label for="token" class="control-label">{{ 'Token' }}</label>
    <input class="form-control" name="token" type="text" id="token" value="{{ isset($exam->token) ? $exam->token : ''}}">
    {!! $errors->first('token', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <select name="status" class="form-control" id="status" required >
        @foreach (json_decode('{"aktif":"aktif","tidak aktif":"tidak aktif"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($exam->status) && $exam->status == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
    
</select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
