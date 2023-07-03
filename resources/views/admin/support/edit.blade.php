@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Support chat #{{ $chat->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/support') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @foreach($chat->messages as $message)
                            <div class="row {{ $message->sender->id == auth()->id() ? 'own chat-message-right' : 'chat-message-left' }}">
                                <div class="col-lg-12">
                                    <div class="media">
                                        <a class="pull-{{ $message->sender->id == auth()->id() ? 'right' : 'left' }}" href="#">
                                            <img class="media-object img-circle img-chat" src="{{ $message->sender->getAvatarUrl() }}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $message->sender->id == auth()->id() ? 'You' : $message->sender->name }}
                                                <span class="small pull-right">{{ strtolower(substr($message->created_at->toDayDateTimeString(), -8)) }}</span>
                                            </h4>
                                            <p>{{ $message->body }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <form method="post" role="form" action="{{ url('/admin/support/' . $chat->id) }}">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <textarea name="text" class="form-control" placeholder="Enter message..."></textarea>
                            </div>
                            <div class="form-group">
                                <button id="support-send" type="submit" class="btn pull-right">Send</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
