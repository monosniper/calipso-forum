<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <select name="type" class="form-control" id="type" >
    @foreach (json_decode('["purchase","replenish"]', true) as $optionKey => $optionValue)
        <option value="{{ $optionValue }}" {{ (isset($transaction->type) && $transaction->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'Amount' }}</label>
    <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($transaction->amount) ? $transaction->amount : ''}}" >
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <select class="form-control" name="user_id" id="user_id">
        @foreach($users as $user)
            <option {{ (isset($transaction->user_id) && $transaction->user_id == $user->id) ? 'selected' : ''}} value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
    <label for="created_at" class="control-label">{{ 'Created at' }}</label>
    <input class="form-control" name="created_at" type="datetime-local" id="created_at" value="{{ isset($transaction->created_at) ? $transaction->created_at : ''}}" >
    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
