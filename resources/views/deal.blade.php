@extends('layouts.main')

@section('title')
    {{ config('app.name') }} - {{ "Deal #".$deal->id }}
@endsection

@section('content')
    <div class="chat">
        <div class="deal__toolbar">
            @unless($deal->invited)
                <form action="{{ route('deal.invite') }}" method="post">
                    @csrf
                    <label for="email">Invite user</label>
                    <input type="hidden" name="deal_id" value="{{ $deal->id }}">
                    <input required type="email" class="form-control" name="email" placeholder="User email" />
                    <button class="deal__btn">Invite</button>
                </form>
            @endunless
            @unless($deal->info || $deal->user_id != auth()->id())
                <form action="{{ route('deal.offer') }}" method="post">
                    @csrf
                    <label for="info">Offer a service</label>
                    <input type="hidden" name="deal_id" value="{{ $deal->id }}">
                    <input required type="number" class="form-control" name="price" placeholder="Price ($)" />
                    <textarea required placeholder="Information" name="info" cols="30" rows="10"></textarea>
                    <button class="deal__btn">Offer</button>
                </form>
            @endunless
        </div>
        <div class="position-relative mb-3">
            <div class="chat-messages p-4">
                @foreach($deal->chat()->messages as $message)
                    @include('inc.message')
                @endforeach
            </div>
        </div>

        <div class="flex-grow-0 py-3 px-4 border-top">
            <form action="{{ route('deal.message') }}" method="post" class="input-group">
                @csrf
                <input type="hidden" name="deal_id" value="{{ $deal->id }}">
                <input type="text" class="form-control" name="body" placeholder="Type your message" />
                <button class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
