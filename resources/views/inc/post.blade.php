<div class="table-row">
    <div class="status">
        <i class="fa fa-{{ $post->getStatusIcon() }}"></i>
    </div>
    <div class="subjects">
        <a href="{{ route('post', $post->id) }}">{{ $post->title }}</a>
        <br>
        <span>Started by <b><a href="#">{{ $post->author->name }}</a></b> .</span>
    </div>
    <div class="replies">
        {{ $post->replies_count }} replies <br> {{ $post->views }} views
    </div>

    @if($post->replies_count)
        <div class="last-reply">
            {{ $post->last_reply()->created_at->toFormattedDateString() }}
            <br>By <b><a href="#">{{ $post->last_reply()->author->name }}</a></b>
        </div>
    @endif
</div>
