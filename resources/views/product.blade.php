@extends('layouts.main')

@section('title')
    {{ config('app.name') }} - {{ $product->title }}
@endsection

@section('search')
    @include('inc.search-shop')
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container bootdey">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body row">
                    <div class="col-md-6">
                        <div class="pro-img-details">
                            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->title }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="pro-d-title">
                            <a href="#" class="">
                                {{ $product->title }}
                            </a>
                        </h4>
                        <p>
                            {{ $product->description }}
                        </p>
                        <div class="m-bot15"> <strong>Price : </strong> <span class="pro-price"> ${{ $product->price }}</span></div>
                        <a href="{{ route('buy', $product->id) }}">
                            <button class="btn btn-round btn-danger" type="button"><i class="fa fa-shopping-cart"></i> Buy</button>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
