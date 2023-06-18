<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($post->title) ? $post->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($post->content) ? $post->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <select name="status" class="form-control" id="status" >
    @foreach (json_decode('["open","closed","closed_without_solution"]', true) as $optionKey => $optionValue)
        <option value="{{ $optionValue }}" {{ (isset($post->status) && $post->status == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('views') ? 'has-error' : ''}}">
    <label for="views" class="control-label">{{ 'Views' }}</label>
    <input class="form-control" name="views" type="number" id="views" value="{{ isset($post->views) ? $post->views : ''}}" >
    {!! $errors->first('views', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('thread_id') ? 'has-error' : ''}}">
    <label for="thread_id" class="control-label">{{ 'Thread Id' }}</label>
    <select class="form-control" name="thread_id" id="thread_id">
        @foreach($threads as $thread)
            <option {{ (isset($thread->thread_id) && $post->thread_id == $thread->id) ? 'selected' : ''}} value="{{ $thread->id }}">{{ $thread->title }}</option>
        @endforeach
    </select>
    {!! $errors->first('thread_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <select class="form-control" name="user_id" id="user_id">
        @foreach($users as $user)
            <option {{ (isset($post->user_id) && $post->user_id == $user->id) ? 'selected' : ''}} value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
    <label for="created_at" class="control-label">{{ 'Created at' }}</label>
    <input class="form-control" name="created_at" type="datetime-local" id="created_at" value="{{ isset($post->created_at) ? $post->created_at : ''}}" >
    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
