<div class="portlet-heading">
    <div class="portlet-title">
        <h4><i class="fa fa-circle text-green"></i> 24/7 Support</h4>
    </div>
    <div class="portlet-widgets">
        <div id="support-toggler"><i class="fa fa-chevron-down"></i></div>

        {{--            <div class="btn-group">--}}
        {{--                <button type="button" class="btn btn-white dropdown-toggle btn-xs" data-toggle="dropdown">--}}
        {{--                    <i class="fa fa-circle text-green"></i> Status--}}
        {{--                    <span class="caret"></span>--}}
        {{--                </button>--}}
        {{--                <ul class="dropdown-menu" role="menu">--}}
        {{--                    <li><a href="#"><i class="fa fa-circle text-green"></i> Online</a>--}}
        {{--                    </li>--}}
        {{--                    <li><a href="#"><i class="fa fa-circle text-orange"></i> Away</a>--}}
        {{--                    </li>--}}
        {{--                    <li><a href="#"><i class="fa fa-circle text-red"></i> Offline</a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--            <span class="divider"></span>--}}
        {{--            <a data-toggle="collapse" data-parent="#accordion" href="#chat"><i class="fa fa-chevron-down"></i></a>--}}
    </div>
</div>
<div id="chat" class="panel-collapse collapse in">
    <div>
        <div class="portlet-body chat-widget" style="overflow-y: auto; width: auto; height: 300px;">
            @forelse($messages as $message)
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
            @empty
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center text-muted small">Write a message</p>
                        {{--                        <p class="text-center text-muted small">January 1, 2014 at 12:23 PM</p>--}}
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <div class="portlet-footer">
        <div role="form">
            <div class="form-group">
                <textarea id="support-input" class="form-control" placeholder="Enter message..."></textarea>
            </div>
            <div class="form-group">
                <button id="support-send" type="button" class="btn btn-default pull-right">Send</button>
                <button id="support-refresh" type="button" class="btn btn-default pull-right">Refresh</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
