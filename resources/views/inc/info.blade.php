@php
    $last_post = App\Models\Post::all()->last();
    if($last_post) {
        $last_post->load('author');
    }
@endphp

<div class="forum-info">
    <div class="chart">
        {{ config('app.name') }} - Stats &nbsp;<i class="fa fa-bar-chart"></i>
    </div>
    <span><u>{{ App\Models\Post::count() }}</u> Posts in <u>{{ App\Models\Thread::count() }}</u> Threads by <u>{{ App\Models\User::count() }}</u> Members.</span><br>
    @if($last_post)
        <span>Latest post: <b><a href="{{ route('post', $last_post->id) }}">{{ $last_post->title }}</a></b> on {{ $last_post->created_at->toFormattedDateString() }} By <a href="#">{{ $last_post->author->name }}</a></span>.<br>
    @endif
    <span>Check <a href="{{ route('posts') }}">the latest posts</a> .</span><br>
</div>
