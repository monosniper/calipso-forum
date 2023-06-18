<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($reply->content) ? $reply->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
    <label for="post_id" class="control-label">{{ 'Post Id' }}</label>
    <select class="form-control" name="post_id" id="post_id">
        @foreach($posts as $post)
            <option {{ (isset($reply->post_id) && $reply->post_id == $post->id) ? 'selected' : ''}} value="{{ $post->id }}">{{ $post->title }}</option>
        @endforeach
    </select>
    {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
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
<div class="form-group {{ $errors->has('reply_id') ? 'has-error' : ''}}">
    <label for="reply_id" class="control-label">{{ 'Reply Id' }}</label>
    <select class="form-control" name="reply_id" id="reply_id">
        <option value="" selected>None</option>
        @foreach($replies as $_reply)
            <option {{ (isset($reply->reply_id) && $reply->reply_id == $_reply->id) ? 'selected' : ''}} value="{{ $_reply->id }}">{{ $_reply->id }}</option>
        @endforeach
    </select>
    {!! $errors->first('reply_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
    <label for="created_at" class="control-label">{{ 'Created at' }}</label>
    <input class="form-control" name="created_at" type="datetime-local" id="created_at" value="{{ isset($reply->created_at) ? $reply->created_at : ''}}" >
    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
