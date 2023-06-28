@extends('layouts.main')

@section('title')
    {{ config('app.name') }} - Users
@endsection

@section('content')
    <div class="users" style="display: flex;flex-wrap: wrap;gap: 10px;">
        @foreach($users as $user)
            <div class="authors">
                <div class="username"><a href="#">{{ $user->name }}</a></div>
                <div>{{ $user->getRole() }}</div>
                <img src="{{ $user->getAvatarUrl() }}" alt="">
                <div>Posts: <u>{{ $user->posts_count }}</u></div>
                <div>Total views: <u>{{ $user->posts_sum_views }}</u></div>
                <div>Deals through a guarant: <u>{{ $user->deals }}</u></div>
                <div>Deposit: <u>${{ $user->balance }}</u></div>
            </div>
        @endforeach
    </div>
@endsection
