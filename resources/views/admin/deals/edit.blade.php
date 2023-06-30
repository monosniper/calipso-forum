@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Deal #{{ $deal->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/deals') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <p>{{ $deal->info }}</p>
                        <br><br>
                        <p>${{ $deal->price }}</p>

                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if($deal->info && $deal->price && !$deal->wallet)
                            <form method="POST" action="{{ url('/admin/deals/' . $deal->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <input type="hidden" name="type" value="wallet">

                                <div class="form-group {{ $errors->has('wallet') ? 'has-error' : ''}}">
                                    <label for="created_at" class="control-label">{{ 'Wallet' }}</label>
                                    <input class="form-control" name="wallet" type="text" id="wallet" value="{{ isset($deal->wallet) ? $deal->wallet : ''}}" >
                                    {!! $errors->first('wallet', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Send">
                                </div>
                            </form>
                        @endif

                        @if($deal->payed)
                            <form method="POST" action="{{ url('/admin/deals/' . $deal->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <input type="hidden" name="type" value="payed">

                                <div class="form-group {{ $errors->has('wallet') ? 'has-error' : ''}}">
                                    <label for="completed" class="control-label">{{ 'Approve (1 yes 0 no)' }}</label>
                                    <input class="form-control" name="completed" type="checkbox" id="completed" checked="{{ $deal->completed }}" >
                                    {!! $errors->first('completed', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Ok">
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
