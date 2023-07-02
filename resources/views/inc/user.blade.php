<div class="authors">
    <div class="username"><a href="#">{{ $user->name }}</a>
        @isset($created_at)
            <small> on {{ $created_at->toDayDateTimeString() }}</small>
        @endisset
    </div>
    @foreach($user->roles as $role)
        <div style="color: {{ \App\Models\Role::getColor($role->id) }}">{{ \App\Models\Role::getName($role->id) }}</div>
    @endforeach
    <img src="{{ $user->getAvatarUrl() }}" alt="">
    <div>Rating: <u>{{ $user->rating }}</u></div>
    <div>Posts: <u>{{ $user->posts_count }}</u></div>
    <div>Total views: <u>{{ $user->posts_sum_views }}</u></div>
    <div>Deals through a guarant: <u>{{ $user->deals }}</u></div>
    <div>Deposit: <u>${{ $user->balance }}</u></div>
</div>
