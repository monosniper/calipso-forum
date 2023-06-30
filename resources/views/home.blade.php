@extends('layouts.main')

@section('title')
    {{ config('app.name') }}
@endsection

@section('search')
    @include('inc.search')
@endsection

@section('content')
    @foreach($categories as $category)
        <div class="subforum">
            <div class="subforum-title">
                <h1>{{ $category->title }}</h1>
            </div>
            @foreach($category->threads as $thread)
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
{{--                        <i class="fa fa-car center"></i>--}}
                        <img width="55" src="{{ asset('img/it.png') }}" alt="{{ $thread->title }}">
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="{{ route('thread', $thread->id) }}">{{ $thread->title }}</a></h4>
                        <p>{{ $thread->description }}</p>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span>{{ $thread->posts_count }} Posts</span>
                    </div>
                    @if($thread->posts_count)
                        <div class="subforum-info subforum-column">
                            <b><a href="{{ route('post', $thread->last_post()->id) }}">Last post</a></b> by <a href="#">{{ $thread->last_post()->author->name }}</a>
                            <br>on <small>{{ $thread->last_post()->created_at->toFormattedDateString() }}</small>
                        </div>
                    @endif
                </div>
                <hr class="subforum-devider">
            @endforeach
        </div>
    @endforeach
@endsection
