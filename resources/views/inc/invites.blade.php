<div class="invites">
    @foreach(auth()->user()->invites as $invite)
        <div class="invite alert alert-info">
            You have new invite from {{ $invite->from->name }}<br>
            To join click <a href="{{ route('deal.join', $invite->id) }}">here</a>
        </div>
    @endforeach
</div>
