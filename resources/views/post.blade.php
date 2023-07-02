@extends('layouts.main')

@section('title')
    {{ config('app.name') }}
@endsection

@section('search')
    @include('inc.search')
@endsection

@section('content')
    <div class="navigate">
        <span><a href="{{ route('home') }}">{{ config('app.name') }} </a> >> <a href="{{ route('thread', $post->thread_id) }}">{{ $post->thread->title }}</a> >> {{ $post->title }}</span>
    </div>
    <div class="topic-container">
        <!--Original thread-->
        <div class="head">
            <div class="authors">Author</div>
            <div class="content">Topic: {{ $post->title }} (Read {{ $post->views }} Times)</div>
        </div>

        <div class="body">
            @include('inc.user', ['user' => $post->author, 'created_at' => $post->created_at])
            <div class="content">
                {!! $post->content !!}
                @auth
                    <div class="comment">
                        <button onclick="showComment()">Comment</button>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!--Comment Area-->
    @auth
        <form method="post" action="{{ route('reply') }}" class="comment-area hide" id="comment-area">
            @csrf
            @method('post')
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <textarea name="content" id="content" placeholder="reply here ... "></textarea>
            <input type="submit" value="submit">
        </form>
    @endauth

    <!--Comments Section-->
    @foreach($replies as $reply)
        <div class="comments-container">
            <div class="body">
                @include('inc.user', ['user' => $reply->author, 'created_at' => $reply->created_at])
                <div class="content">
                    @if($reply->reply_id)
                        <div class="answer">
                            <div class="answer__header">
                                <i class="fa fa-reply"></i>
                                <span>{{ $reply->parent->author->name }}</span>
                            </div>
                            <div class="answer__body">{{ $reply->parent->content }}</div>
                        </div>
                    @endif
                    {!! $reply->content !!}
                    @auth
                        <div class="comment">
                            <button onclick="showReply({{ $reply->id }})">Reply</button>
                        </div>
                    @endauth
                </div>
            </div>
            <!--Reply Area-->
            @auth
                <form method="post" action="{{ route('reply') }}" class="comment-area hide" id="reply-area-{{ $reply->id }}">
                    @csrf
                    @method('post')
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="reply_id" value="{{ $reply->id }}">
                    <textarea name="content" id="content" placeholder="reply here ... "></textarea>
                    <input type="submit" value="submit">
                </form>
            @endauth
        </div>
    @endforeach

    {{ $replies->links() }}
@endsection
