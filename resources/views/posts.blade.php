@extends('layouts.main')

@section('title')
    Latest posts
@endsection

@section('search')
    @include('inc.search')
@endsection

@section('content')
    <div class="navigate">
        <span><a href="{{ route('home') }}">{{ config('app.name') }} </a> >> Latest posts</span>
    </div>
    <div class="posts-table">
        <div class="table-head">
            <div class="status">Status</div>
            <div class="subjects">Subjects</div>
            <div class="replies">Replies/Views</div>
            <div class="last-reply">Last Reply</div>
        </div>
        @foreach($posts as $post)
            @include('inc.post')
        @endforeach
    </div>

    {{ $posts->links() }}
@endsection
