<div class="message {{ $message->sender->id == auth()->id() ? 'own chat-message-right' : 'chat-message-left' }} pb-4">
    <div>
        <img src="{{ $message->sender->getAvatarUrl() }}" class="rounded-circle mr-1" alt="{{ $message->sender->name }}" width="40" height="40">
        <div class="text-muted small text-nowrap mt-2">{{ strtolower(substr($message->created_at->toDayDateTimeString(), -8)) }}</div>
    </div>
    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
        <div class="font-weight-bold mb-1">{{ $message->sender->id == auth()->id() ? 'You' : $message->sender->name }}</div>
        {{ $message->body }}
    </div>
    @if($message->type === 'pay' && !$deal->payed && $deal->user_id !== auth()->id())
        <a class="pay-btn" href="{{ route('deal.payed', $deal->id) }}">Payed</a>
    @endif
</div>
