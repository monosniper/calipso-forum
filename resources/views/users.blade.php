@extends('layouts.main')

@section('title')
    {{ config('app.name') }} - Users
@endsection

@section('content')
    <div class="users" style="display: flex;flex-wrap: wrap;gap: 10px;">
        @foreach($users as $user)
            @include('inc.user')
        @endforeach
    </div>
@endsection
